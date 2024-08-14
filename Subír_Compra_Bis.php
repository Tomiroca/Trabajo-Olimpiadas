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

$ID_Compra = "";
$query = mysqli_query ($conn, " SELECT ID_Compra FROM compras Where ID_Producto = ".$_SESSION["ID_Producto"]."") or die (mysqli_error($conn));
while ($row = mysqli_fetch_array($query)){
    $ID_Compra = $row["ID_Compra"];
}

if(isset($Listo)){
    $sql = "INSERT INTO pago (ID_Compra) VALUES ('$ID_Compra')";
}

if ($conn->query($sql) === TRUE and $conn->query($sql2) === TRUE){
    $_SESSION["Registrado"]= 1 ;
    $_SESSION["Volver"] = 0;
    $_SESSION["ID_Producto"] = 0;
    header("Location:Index.php");
    exit;
} else{
    echo "Error al insetar registro: " . $conn->error;
}

$conn->close();
?>