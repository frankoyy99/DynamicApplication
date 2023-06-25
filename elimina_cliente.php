<?php
include("conexion.php");
$id=$_GET["id"];
$actualizar="DELETE FROM clientes WHERE id_cliente='$id'";
$resultado=mysqli_query($conexion,$actualizar);
header("location:clientes.php");
?>