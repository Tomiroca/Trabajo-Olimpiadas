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
$Nombre =""; 
$Email = ""; 
$Contra = "";

if(isset($Listo)){
    $sql = "INSERT INTO usuarios ( Nombre, Email, Contraseña) VALUES ('$Nombre', '$Email', '$Contra')";
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