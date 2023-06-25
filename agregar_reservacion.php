<?php
include("conexion.php");
if (isset($_POST["cliente"])) {
    $fechai=$_POST["fechai"];
    $fechaf=$_POST["fechaf"];
    $cliente=$_POST["cliente"];
    $habitacion=$_POST["habitacion"];
    $huespedes=$_POST["huespedes"];
    $pago_total=$_POST["pago_total"];
    $link=new PDO("mysql:host=localhost;dbname=hotel","root","");
if (repetido($habitacion,$conexion)==1) {
    echo '<script type="text/javascript">';
    echo 'alert("Habitacion no disponible");';
    echo '</script>';
    require ("nueva_reservacion.php");//si se usa header salta la alerta xd ya no moverle porque es la base a los otros
}else {
    $sql="INSERT INTO reservaciones(fecha_entrada,fecha_salida,id_habitacion,id_cliente,numero_huespedes,pago_total)";
$sql.="VALUES('$fechai','$fechaf','$habitacion','$cliente','$huespedes','$pago_total')";
$resultado=mysqli_query($conexion,$sql); //no borrar esto porque xd me pasara lo mismo
if ($resultado) {
    $id_reservacion = mysqli_insert_id($conexion); // Obtener el ID de la última reservación insertada
    $sql_pago = "INSERT INTO pagos (monto, fecha_pago, id_reservacion, id_habitacion) VALUES ('$pago_total','$fechaf','$id_reservacion','$habitacion')";
    $resultado_pago = mysqli_query($conexion, $sql_pago);
} else {
    echo '<script type="text/javascript"> alert("Error al registrar la reservación") </script>';
}
$sql_update = "UPDATE habitaciones SET disponible = 0 WHERE id_habitacion = '$habitacion'";
    mysqli_query($conexion, $sql_update);
    echo '<script type="text/javascript"> alert("Reservacion exitosa") </script>';
header("Location: reservaciones.php");
}
}
function repetido($habitacion,$conexion){
    $sql="SELECT*FROM reservaciones WHERE id_habitacion='$habitacion'";
    $resultado=mysqli_query($conexion,$sql);
    if (mysqli_num_rows($resultado)>0) {
        return 1;
    } else {
        return 0;
    }
}
?>