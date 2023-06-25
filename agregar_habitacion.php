<?php
include("conexion.php");
if (isset($_POST["numero_habitacion"])) {
    $numero=$_POST["numero_habitacion"];
    $tipo=$_POST["tipo_habitacion"];
    $precio=$_POST["precio_noche"];
    $disponible=$_POST["disponibilidad"];
if (repetido($numero,$conexion)==1) {
    echo '<script type="text/javascript">';
    echo 'alert("Registro ya existente");';
    echo '</script>';
    require ("nueva_habitacion.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
}else {
    $sql="INSERT INTO habitaciones (numero_habitacion,tipo_habitacion,precio_noche,disponible)";
$sql.="VALUES('$numero','$tipo','$precio','$disponible')";
$resultado=mysqli_query($conexion,$sql); //no borrar esto porque xd me pasara lo mismo
    echo '<script type="text/javascript">';
    echo 'alert("Registro exitoso");';
    echo '</script>';
require ("habitaciones.php");
}
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