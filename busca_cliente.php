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
    <title>Buscador con AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <table class="tabla" border="0">
        <tr>
            <th class="celda" colspan="7"><h1>Clientes</h1></th>
            <th class="celda" colspan="2"><h1>Opciones</h1></th>
        </tr>
        <tr>
            <td hidden class="celda">Id Cliente</td>
            <td class="celda">Nombre</td>
            <td class="celda">Apellido Paterno</td>
            <td class="celda">Apellido Materno</td>
            <td class="celda">Edad</td>
            <td class="celda">Domicilio</td>
            <td class="celda">Telefono</td>
            <td class="celda">Correo</td>
            <td class="new" colspan="2"><a href="nuevo_cliente.php"><i class="ri-user-add-fill op"></i></a></td>
        </tr>
        <?php
$searchText = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT * FROM clientes WHERE nombre LIKE '%$searchText%' or apellidop LIKE '%$searchText%' or apellidom LIKE '%$searchText%'";
$resultSet = $conexion->query($query);
$foundResults = false;
foreach ($resultSet as $row) {
    $foundResults = true;
    ?>
            <tr>
                <td hidden class="celda"><?php echo $row['id_cliente'] ?></td>
                <td class="celda"><?php echo $row['nombre'] ?></td>
                <td class="celda"><?php echo $row['apellidop'] ?></td>
                <td class="celda"><?php echo $row['apellidom'] ?></td>
                <td class="celda"><?php echo $row['edad'] ?></td>
                <td class="celda"><?php echo $row['direccion'] ?></td>
                <td class="celda"><?php echo $row['telefono'] ?></td>
                <td class="celda"><?php echo $row['correo_electronico'] ?></td>
                <td class="edit"><a href="editar_cliente.php?id=<?php echo $row['id_cliente'] ?>"><i class="ri-edit-fill op"></i></a></td>
                <td class="elim"><a href="elimina_cliente.php?id=<?php echo $row['id_cliente'] ?>" onclick="return eliminacion();"><i class="ri-delete-bin-4-fill op"></i></a></td>
            </tr>
    <?php }
if (!$foundResults) {
    ?>
    <tr>
        <td class="celda" colspan="10">No se encontraron coincidencias</td>
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