<?php
include_once('config/Conexion.php');

$usuario = $_POST['nombres'];
$password = $_POST['password'];


$consulta = "select * from usuario where nombres = '$usuario' and password = '$password'";
$resultado = mysqli_query($conexion,$consulta);
$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("location:view/ventas.php");
}else{
    
    include('index.php');
    echo "Error en la autentificacion";
}
?>