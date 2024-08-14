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

$Email= $_POST["email"];
$Contra=$_POST["contra"];

if(isset($_POST["email"])){
    $query = mysqli_query($conn, " SELECT * FROM usuarios where Email='".$Email."' AND Contraseña='".$Contra."' ") or die (mysqli_error($conn));
    if ($conn = mysqli_fetch_array($query)){
        $_SESSION["Registrado"] = 1;
        $_SESSION["Volver"]=0;
        header("Location:Index.php");
    } else{
        $_SESSION["Error"] = 1;
        header("Location:Acceso.php");
    }
}

$conn->close();
?>