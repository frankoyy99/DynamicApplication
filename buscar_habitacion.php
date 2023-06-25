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
    <title>Habitaciones</title>
</head>
<body>
            <!-- inicio tabla -->
    <table class="tabla" border="1">
        <tr>
            <th class="celda" colspan="4"> <h1>Habitaciones</h1> </th>
            <th class="celda" colspan="2"> <h1>Opciones</h1></th>
        </tr>
        <tr>
        <td hidden class="celda">Id habitacion</td>
        <td class="celda">Numero habitacion</td>
        <td class="celda">Tipo habitacion</td>
        <td class="celda">Disponibilidad</td>
        <td class="celda">Precio</td>
        <td class="new" colspan="2"><a href="nueva_habitacion.php"><i class="ri-add-fill op"></i></a></td>
        </tr>
        <?php
    $searchText = isset($_POST['search']) ? $_POST['search'] : '';
    $query = "SELECT * FROM habitaciones WHERE numero_habitacion LIKE '%$searchText%' or tipo_habitacion LIKE '%$searchText%' OR disponible = 1 AND 'libre' LIKE '%$searchText%'  OR disponible = 0 AND 'ocupado' LIKE '%$searchText%'";
    $resultSet = $conexion->query($query);
    $foundResults = false;
    foreach ($resultSet as $row) {
        $foundResults = true;
        ?>

<tr><!-- hidden solo oculta  -->
        <td hidden class="celda"> <?php echo $row['id_habitacion'] ?> </td>
        <td class="celda"> <?php echo $row['numero_habitacion'] ?> </td>
        <td class="celda"> <?php echo $row['tipo_habitacion'] ?> </td>
        <td class="<?php echo ($row['disponible'] == 1) ? 'disponible' : 'ocupada' ?>"></td>
        <td class="celda"> <?php echo $row['precio_noche'] ?> </td>
        <td class="edit"><a href="editar_habitacion.php?id=<?php echo $row['id_habitacion']?>"><i class="ri-edit-fill op"></i></a></td>
        <td class="elim"><a href="elimina_habitacion.php?id=<?php echo $row['id_habitacion']?>" onclick="return eliminacion();"><i class="ri-delete-bin-4-fill op"></i></a></td>
</tr>
<?php }
if (!$foundResults) {
    ?>
    <tr>
        <td class="celda" colspan="10">No se encontraron coincidencias</td>
    </tr>
<?php } ?>
    </table>
            <!-- fin tablas -->
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
$fechaActual = date("Y-m-d");
$sql = "SELECT r.*,h.id_habitacion, h.numero_habitacion, h.tipo_habitacion, h.precio_noche, h.disponible
FROM reservaciones r
INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion WHERE fecha_salida < '$fechaActual' AND disponible = 0";
$resultado = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    $idHabitacion = $row['id_habitacion'];
    $sql_update = "UPDATE habitaciones SET disponible = 1 WHERE id_habitacion = '$idHabitacion'";
    mysqli_query($conexion, $sql_update);
}
    }else {
        header("location:sesion.php");
    }
?>