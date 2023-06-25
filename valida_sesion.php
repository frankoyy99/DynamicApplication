<?php
include ("conexion.php");
session_start();
    $usuario=$_POST["usuario"];
    $contraseña=$_POST["contraseña"];

    $sql="SELECT e.nombre,e.contraseña,c.id_cargo, c.nombre_cargo
    FROM empleados e
    INNER JOIN cargo c ON e.id_cargo = c.id_cargo
    WHERE nombre='$usuario' AND contraseña='$contraseña'";
    $resultado=$conexion->query($sql);

     $row=mysqli_fetch_assoc($resultado);
     if (isset($row['nombre'])==$usuario && isset($row['contraseña'])==$contraseña) {
        if ($row['id_cargo']==1) {
            $_SESSION['nombre']=$usuario;
            $_SESSION['id_cargo']=$row;
            header("location:index.php");
        }else if ($row['id_cargo']==2) {
            $_SESSION['nombre']=$usuario;
            $_SESSION['id_cargo']=$row;
            header("location:index.php");
        }
        }else{
        echo '<script type="text/javascript"> alert("No existe el usuario") </script>';
        require "sesion.php";
}
    mysqli_free_result($resultado);
?>