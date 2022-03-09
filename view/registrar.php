<?php 
include_once("../config/Conexion.php");

$IdVenta = $_POST["IdVenta"];
$IdProducto = $_POST["IdProducto"];
$Cantidad = $_POST["Cantidad"];
$Precio = $_POST["Precio"];
$SubTotal = $_POST["SubTotal"];

$sql = "insert into detalle_venta (IdVenta,IdProducto,Cantidad,Precio,SubTotal) values ('$IdVenta','$IdProducto','$Cantidad','$Precio','$SubTotal')";
$rs = mysqli_query($conexion,$sql);
    if ($rs) {
        echo "Registro exitoso";
        header("location:ventas.php");
    }else{
        echo "Registro fallido";
    }
?>