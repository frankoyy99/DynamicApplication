<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre'])&&isset($_SESSION['id_cargo'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Reservaciones</title>
</head>
<body>
            <!-- -------------tablas---------- -->
    <table class="tabla" border="0">
        <tr>
            <th class="celda" colspan="7"> <h1>Reservaciones</h1> </th>
            <th class="celda" colspan="2"> <h1>Opciones</h1></th>
        </tr>
        <tr>
        <td class="celda">Habitacion</td>
        <td class="celda">Fecha de Entrada</td>
        <td class="celda">Fecha de Salida</td>
        <td class="celda">Tipo de habitación</td>
        <td class="celda">Cliente</td>
        <td class="celda">Numero de huespedes</td>
        <td class="celda">Pago Total</td>
        <td class="new" colspan="2"><a href="nueva_reservacion.php"><i class="ri-add-fill op"></i></a></td>
        </tr>
        <?php
$searchText = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT r.*, h.numero_habitacion, h.tipo_habitacion, h.precio_noche, h.disponible, c.nombre, c.apellidop, c.apellidom, c.edad, c.direccion, c.telefono, c.correo_electronico
FROM reservaciones r
INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion
INNER JOIN clientes c ON r.id_cliente = c.id_cliente WHERE numero_habitacion LIKE '%$searchText%' or fecha_entrada LIKE '%$searchText%' or fecha_salida LIKE '%$searchText%'";
$resultSet = $conexion->query($query);
$foundResults = false;
foreach ($resultSet as $row) {
    $foundResults = true;
    ?>
<tr><!-- hidden solo oculta  -->
        <td class="celda"> <?php echo $row['numero_habitacion'] ?> </td>
        <td class="celda"> <?php echo $row['fecha_entrada'] ?> </td>
        <td class="celda"> <?php echo $row['fecha_salida'] ?> </td>
        <td class="celda"> <?php echo $row['tipo_habitacion'] ?> </td>
        <td class="celda"> <?php echo $row['nombre'] ?> </td>
        <td class="celda"> <?php echo $row['numero_huespedes'] ?> </td>
        <td class="celda"> <?php echo $row['pago_total'] ?> </td>
        <td class="edit"><a href="editar_reservacion.php?id=<?php echo $row['id_reservacion']?>"><i class="ri-edit-fill op"></i></a></td>
        <td class="elim"><a href="elimina_reservacion.php?id=<?php echo $row['id_reservacion']?>" onclick="return elimina();"><i class="ri-delete-bin-4-fill op"></i></a></td>
</tr>
<?php }
if (!$foundResults) {
    ?>
    <tr>
        <td class="celda" colspan="10">No se encontraron coincidencias</td>
    </tr>
<?php } ?>
    </table>
    <!-- -------------termina tabla------------ -->
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
    }else {
        header("location:sesion.php");
    }
?>