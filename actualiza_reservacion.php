<?php
include("conexion.php");
if (isset($_POST["id"])) {
    $id=$_POST["id"];
    $fechai=$_POST["fechai"];
    $fechaf=$_POST["fechaf"];
    $cliente=$_POST["cliente"];
    $habitacion=$_POST["habitacion"];
    $huespedes=$_POST["huespedes"];
    $pago_total=$_POST["pago_total"];
    if (repetido($fechai,$fechaf,$habitacion,$cliente,$huespedes,$pago_total,$conexion)==1) {
        echo '<script type="text/javascript">';
        echo 'alert("Reservacion ya existente");';
        echo '</script>';
        header("Location: editar_reservacion.php?id=$id");
    }else {
    $actualizar="UPDATE reservaciones SET fecha_entrada='$fechai',fecha_salida='$fechaf',id_habitacion='$habitacion',id_cliente='$cliente',numero_huespedes='$huespedes',pago_total='$pago_total' WHERE id_reservacion='$id'";
$resultado=mysqli_query($conexion,$actualizar);

$sql_update = "UPDATE habitaciones SET disponible = 0 WHERE id_habitacion = '$habitacion'";
    mysqli_query($conexion, $sql_update);
echo '<script type="text/javascript">';
echo 'alert("Reservacion modificada");';
echo '</script>';
//require("reservaciones.php");
header("Location: reservaciones.php");
    }
    }
function repetido($fechai,$fechaf,$habitacion,$cliente,$huespedes,$pago_total,$conexion){
    $sql="SELECT*FROM reservaciones WHERE fecha_entrada='$fechai' AND fecha_salida='$fechaf' AND id_habitacion='$habitacion' AND id_cliente='$cliente' AND numero_huespedes='$huespedes' AND pago_total='$pago_total'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>