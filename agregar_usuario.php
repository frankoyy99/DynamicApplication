<?php
include("conexion.php");
if (isset($_POST["nombre"])) {
    $nombre=$_POST["nombre"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $contraseña=$_POST["contraseña"];
    $salario=$_POST["salario"];
    $tipo=$_POST["id_cargo"];
if (repetido($nombre,$conexion)==1) {
    echo '<script type="text/javascript">';
    echo 'alert("Registro ya existente");';
    echo '</script>';
    require ("nuevo_usuario.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
}else {
    $sql="INSERT INTO empleados (nombre,direccion,telefono,correo_electronico,contraseña,salario,id_cargo)";
$sql.="VALUES('$nombre','$direccion','$telefono','$correo','$contraseña','$salario','$tipo')";
$resultado=mysqli_query($conexion,$sql); //no borrar esto porque xd me pasara lo mismo
    echo '<script type="text/javascript">';
    echo 'alert("Registro exitoso");';
    echo '</script>';
require ("usuarios.php");
}
}
function repetido($nombre,$conexion){
    $sql="SELECT* FROM empleados WHERE nombre='$nombre'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>