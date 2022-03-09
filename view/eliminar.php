<?php
include_once("../config/Conexion.php");

$IdDetalleVenta = $_GET['IdDetalleVenta'];
$sql = "Delete from detalle_venta where IdDetalleVenta = $IdDetalleVenta";
$rs = mysqli_query($conexion,$sql);

if ($rs) {
    echo "Los datos se eliminaron correctamente";
    header("Location:ventas.php");
}else{
    echo "No se elimino";
}


?>