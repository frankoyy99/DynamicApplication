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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Reservaciones</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="css/image/logo.png" alt icon="">
                </span>
                <div class="text header-text">
                    <span class="name">Bienvenido</span>
                    <span class="profession"><?php echo"[".$usuario."]"?></span>
                </div>
            </div>
            <i class="ri-arrow-right-s-line toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-links">
                        <a href="index.php">
                        <i class="ri-home-2-line icon"></i>
                        <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="clientes.php">
                        <i class="ri-user-3-line icon"></i>
                        <span class="text nav-text">Clientes</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="reservaciones.php">
                        <i class="ri-hotel-bed-fill icon"></i>
                        <span class="text nav-text">Reservaciones</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="habitaciones.php">
                        <i class="ri-door-open-line icon"></i>
                        <span class="text nav-text">Habitaciones</span>
                        </a>
                    </li>
                    <?php
                    if ($row['id_cargo'] == 1) {
                        echo '
                        <li class="nav-links">
                        <a href="usuarios.php">
                        <i class="ri-shield-user-fill icon"></i>
                        <span class="text nav-text">Usuarios</span>
                        </a>
                        </li>';
                    }
                    ?>
                    <li class="nav-links">
                        <a href="pagos.php">
                        <i class="ri-money-dollar-circle-line icon"></i>
                        <span class="text nav-text">Pagos</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="manual.php">
                        <i class="ri-question-fill icon"></i>
                        <span class="text nav-text">Manual</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                        <a href="salir.php" onclick="return confirmacion();">
                        <i class="ri-logout-circle-line icon"></i>
                        <span class="text nav-text">Salir</span>
                        </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class="ri-moon-clear-fill icon moon"></i>
                        <i class="ri-sun-fill icon sun"></i>
                    </div>
                    <span class="mode-text text">Modo Oscuro</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <section class="home">
        <div class="home-conten">
            <!-- -------------tablas---------- -->
            <input class="bux" onkeyup="" type="text" name="buscar" id="buscar" placeholder="Buscar Registro">
    <table class="tabla" id="reservaciones" border="0">
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
<?php foreach($conexion->query("SELECT r.*, h.numero_habitacion, h.tipo_habitacion, h.precio_noche, h.disponible, c.nombre, c.apellidop, c.apellidom, c.edad, c.direccion, c.telefono, c.correo_electronico
        FROM reservaciones r
        INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion
        INNER JOIN clientes c ON r.id_cliente = c.id_cliente") as $row){?>
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
<?php }?>
    </table>
    <!-- -------------termina tabla------------ -->
        </div>
    </section>
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
    }else {
        header("location:sesion.php");
    }
?>