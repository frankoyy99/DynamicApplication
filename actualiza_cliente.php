<?php
include("conexion.php");
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $apellidop=$_POST["apellidop"];
    $apellidom=$_POST["apellidom"];
    $edad=$_POST["edad"];
    $domicilio=$_POST["domicilio"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    if (repetido($nombre,$apellidop,$apellidom,$edad,$domicilio,$telefono,$correo,$conexion)==1) {
        echo '<script type="text/javascript">';
        echo 'alert("Registro ya existente");';
        echo '</script>';
        //require ("editar_cliente.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
        //poner alertas de que repite xd
        header("Location: editar_cliente.php?id=$id");
    }else {
$actualizar="UPDATE clientes SET nombre='$nombre',apellidop='$apellidop',apellidom='$apellidom',edad='$edad',direccion='$domicilio',telefono='$telefono',correo_electronico='$correo' WHERE id_cliente='$id'";
$resultado=mysqli_query($conexion,$actualizar);
echo '<script type="text/javascript">';
echo 'alert("Registro modificado");';
echo '</script>';
require("clientes.php");
}
function repetido($nombre,$apellidop,$apellidom,$edad,$domicilio,$telefono,$correo,$conexion){
$sql="SELECT* FROM clientes WHERE nombre='$nombre' and apellidop='$apellidop' and apellidom='$apellidom' and edad='$edad' and direccion='$domicilio' and telefono='$telefono' and correo_electronico='$correo'";
$resultado=mysqli_query($conexion,$sql);
if (mysqli_num_rows($resultado)>0) {
    return 1;
} else {
    return 0;
}
}
?>