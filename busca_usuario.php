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
    <title>Usuarios</title>
</head>
<body>
            <!-- inicia tabla -->
    <table class="tabla" border="1">
        <tr>
            <th class="celda" colspan="7"> <h1>Usuarios</h1> </th>
            <th class="celda" colspan="2"> <h1>Opciones</h1></th>
        </tr>
        <tr>
        <td hidden class="celda">Id</td>
        <td class="celda">Nombre Usuario</td>
        <td class="celda">Direccion</td>
        <td class="celda">Telefono</td>
        <td class="celda">Correo electronico</td>
        <td class="celda">Contraseña</td>
        <td class="celda">Salario</td>
        <td class="celda">Cargo</td>
        <td class="new" colspan="2"><a href="nuevo_usuario.php"><i class="ri-user-add-fill op"></i></a></td>
        </tr>
        <?php
$searchText = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT e.*, c.nombre_cargo
FROM empleados e
JOIN cargo c ON e.id_cargo = c.id_cargo WHERE nombre LIKE '%$searchText%' or nombre_cargo LIKE '%$searchText%'";
$resultSet = $conexion->query($query);
$foundResults = false;
foreach ($resultSet as $row) {
    $foundResults = true;
    ?>
<tr><!-- hidden solo oculta  -->
        <td hidden class="celda"> <?php echo $row['id_empleado'] ?> </td>
        <td class="celda"> <?php echo $row['nombre'] ?> </td>
        <td class="celda"> <?php echo $row['direccion'] ?> </td>
        <td class="celda"> <?php echo $row['telefono'] ?> </td>
        <td class="celda"> <?php echo $row['correo_electronico'] ?> </td>
        <td class="celda"> <?php echo $row['contraseña'] ?> </td>
        <td class="celda"> <?php echo $row['salario'] ?> </td>
        <td class="celda"> <?php echo $row['nombre_cargo'] ?> </td>
        <td class="edit"><a href="editar_usuario.php?id=<?php echo $row['id_empleado']?>"><i class="ri-edit-fill op"></i></a></td>
        <td class="elim"><a href="elimina_usuario.php?id=<?php echo $row['id_empleado']?>" onclick="return eliminacion();"><i class="ri-delete-bin-4-fill op"></i></a></td>
</tr>
<?php }
if (!$foundResults) {
    ?>
    <tr>
        <td class="celda" colspan="10">No se encontraron coincidencias</td>
    </tr>
<?php } ?>
    </table>
            <!-- termmina tablas -->
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
    }else {
        header("location:sesion.php");
    }
?>