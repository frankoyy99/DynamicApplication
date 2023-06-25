<?php
include("conexion.php");
$id=$_GET["id"];
$actualizar="DELETE FROM reservaciones WHERE id_reservacion='$id'";
$resultado=mysqli_query($conexion,$actualizar);
header("location:reservaciones.php");
?>