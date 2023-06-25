<?php
include("conexion.php");
if (isset($_POST["nombre"])) {
    $nombre=$_POST["nombre"];
    $apellidop=$_POST["apellidop"];
    $apellidom=$_POST["apellidom"];
    $edad=$_POST["edad"];
    $domicilio=$_POST["domicilio"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
if (repetido($nombre,$apellidop,$apellidom,$conexion)==1) {
    echo '<script type="text/javascript">';
    echo 'alert("Registro ya existente");';
    echo '</script>';
    require ("nuevo_cliente.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
}else {
    $sql="INSERT INTO clientes (nombre,apellidop,apellidom,edad,direccion,telefono,correo_electronico)";
$sql.="VALUES('$nombre','$apellidop','$apellidom','$edad','$domicilio','$telefono','$correo')";
$resultado=mysqli_query($conexion,$sql); //no borrar esto porque xd me pasara lo mismo
    echo '<script type="text/javascript">';
    echo 'alert("Registro exitoso");';
    echo '</script>';
require("clientes.php");
}
}
function repetido($nombre,$apellidop,$apellidom,$conexion){
    $sql="SELECT*FROM clientes WHERE nombre='$nombre' AND apellidop='$apellidop' AND apellidom='$apellidom'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>