<?php
include("conexion.php");
$id=$_GET["id"];
$actualizar="DELETE FROM habitaciones WHERE id_habitacion='$id'";
$resultado=mysqli_query($conexion,$actualizar);
header("location:habitaciones.php");
?>