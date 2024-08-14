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
$Nombre_Producto = $_POST["Nombre_Producto"];
$Valór_Producto= $_POST["Valór_Producto"];

if(isset($Listo)){
    $sql = "INSERT INTO productos (Nombre_Producto, Valór_Producto) VALUES ('$Nombre_Producto', '$Valór_Producto')";
}

if ($conn->query($sql) === TRUE){
    $_SESSION["Registrado"]= 1 ;
    $_SESSION["Volver"] = 0;
    header("Location:Index.php");
    exit;
} else{
    echo "Error al insetar registro: " . $conn->error;
}

$conn->close();
?>