<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre'])&&isset($_SESSION['id_cargo'])){
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <table class="tabla" border="0">
    <tr>
            <th class="celda" colspan="7"> <h1>Pagos</h1> </th>
            
        </tr>
        <tr>
        <td hidden class="celda">Id Pago</td>
        <td class="celda">Monto</td>
        <td class="celda">Fecha del pago</td>
        <td class="celda">Id reservacion</td>
        <td class="celda">Id habitacion</td>
        <td class="celda">Id Cliente</td>
        <th class="celda"> <h3>Opcion</h3> </th>
        </tr>

        <?php
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];
$sql = "SELECT p.id_pago, p.monto, p.fecha_pago, h.numero_habitacion, r.id_reservacion, c.nombre
FROM pagos p
INNER JOIN reservaciones r ON p.id_reservacion = r.id_reservacion
INNER JOIN clientes c ON c.id_cliente = r.id_cliente
INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion WHERE fecha_pago BETWEEN '$fechaInicio' AND '$fechaFin'";
$resultSet = $conexion->query($sql);

$foundResults = false;

foreach ($resultSet as $row) {
    $foundResults = true;
    ?>
            <tr>
            <td hidden class="celda"> <?php echo $row['id_pago'] ?> </td>
            <td class="celda"> <?php echo $row['monto'] ?> </td>
            <td class="celda"> <?php echo $row['fecha_pago'] ?> </td>
            <td class="celda"> <?php echo $row['id_reservacion'] ?> </td>
            <td class="celda"> <?php echo $row['numero_habitacion'] ?> </td>
            <td class="celda"> <?php echo $row['nombre'] ?> </td>
            <td class="edit"><?php echo '<a href="generar_ticket.php?id_pago=' . $row['id_pago'] . '"><i class="ri-file-fill op"></i></a>';  ?></td>
        </tr>
    <?php }
if (!$foundResults) {
    ?>
    <tr>
        <td class="celda" colspan="10">No se encontraron registros</td>
    </tr>
<?php } ?>
    </table>
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
    }else {
        header("location:sesion.php");
    }
?>