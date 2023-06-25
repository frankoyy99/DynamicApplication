<?php
include("conexion.php");
$id=$_GET["id"];
$actualizar="DELETE FROM empleados WHERE id_empleado='$id'";
$resultado=mysqli_query($conexion,$actualizar);
header("location:usuarios.php");
?>