<?php
include("conexion.php");
        $id=$_POST["id"];
        $numero=$_POST["numero_habitacion"];
        $tipo=$_POST["tipo_habitacion"];
        $precio=$_POST["precio_noche"];
        $disponible=$_POST["disponibilidad"];
        if (repetido($numero,$conexion)==1) {
            echo '<script type="text/javascript">';
            echo 'alert("Registro ya existente");';
            echo '</script>';
            require ("editar_habitacion.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
        }else {
    $actualizar="UPDATE habitaciones SET numero_habitacion='$numero',tipo_habitacion='$tipo',precio_noche='$precio', disponible='$disponible' WHERE id_habitacion='$id'";
    $resultado=mysqli_query($conexion,$actualizar);
    echo '<script type="text/javascript">';
    echo 'alert("Registro modificado");';
    echo '</script>';
require("habitaciones.php");
}
function repetido($numero,$conexion){
    $sql="SELECT* FROM habitaciones WHERE numero_habitacion='$numero'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>