<?php
include("conexion.php");
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $contraseña=$_POST["contraseña"];
        $salario=$_POST["salario"];
        $tipo=$_POST["id_cargo"];
        if (repetido($nombre,$direccion,$telefono,$correo,$contraseña,$salario,$tipo,$conexion)==1) {
            echo '<script type="text/javascript">';
            echo 'alert("Registro ya existente");';
            echo '</script>';
            require ("editar_usuario.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
        }else {
    $actualizar="UPDATE empleados SET nombre='$nombre',direccion='$direccion',telefono='$telefono', correo_electronico='$correo', contraseña='$contraseña', salario='$salario', id_cargo='$tipo' WHERE id_empleado='$id'";
    $resultado=mysqli_query($conexion,$actualizar);
    echo '<script type="text/javascript">';
    echo 'alert("Registro modificado");';
    echo '</script>';
require("usuarios.php");
}
function repetido($nombre,$direccion,$telefono,$correo,$contraseña,$salario,$tipo,$conexion){
    $sql="SELECT* FROM empleados WHERE nombre='$nombre' AND direccion='$direccion' AND telefono='$telefono' AND correo_electronico='$correo' AND  contraseña='$contraseña'AND salario='$salario' AND id_cargo='$tipo'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>