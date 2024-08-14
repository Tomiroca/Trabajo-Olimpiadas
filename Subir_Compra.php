<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olimpiadas";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Listo = $_POST["Listo"];
$ID_Usuario = $_SESSION["ID_Usuario"];
$ID_Producto = $_SESSION["ID_Producto"];
$Cantidad_Compra = $_POST["Cantidad"];
$Precio_Total = $_POST["Total"];
$Nombre_Producto = "";
$query = mysqli_query ($conn, " SELECT Nombre_Producto FROM productos Where ID_Producto = ".$_SESSION["ID_Producto"]."") or die (mysqli_error($conn));
while ($row = mysqli_fetch_array($query)){
    $Nombre_Producto = $row["Nombre_Producto"];
}

if(isset($Listo)){
    $sql = "INSERT INTO compras (ID_Usuario, ID_Producto, Nombre_Producto, Cantidad_Compra, Precio_Total) VALUES ('$ID_Usuario', '$ID_Producto', '$Nombre_Producto', '$Cantidad_Compra', '$Precio_Total')";
    $sql2 = "INSERT INTO pago (Forma_de_Pago, Precio_Total) VALUES ('$Forma_de_Pago', '$Precio_Total')";
}

if ($conn->query($sql) === TRUE and $conn->query($sql2) === TRUE){
    header("Location:Subír_Compra_Bis.php");
    exit;
} else{
    echo "Error al insetar registro: " . $conn->error;
}

$conn->close();
?>