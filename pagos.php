<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre']) && isset($_SESSION['id_cargo'])){
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
    <title>Pagos</title>
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
            <!-- inicio tabla -->
            <form id="formulario" method="POST" action="busca_reporte.php">
            <label for="fecha_inicio">Fecha de inicio: </label><input class="button-with-icon" type="date" id="fecha_inicio" name="fecha_inicio" required>
            <label for="fecha_fin">Fecha final: </label><input class="button-with-icon" type="date" id="fecha_fin" name="fecha_fin" required>
            <button class="button-with-icon" type="submit"><i class="ri-search-2-fill"></i> Buscar</button>
            <button class="button-with-icon" id="boton-regresar"><a href="pagos.php">Regresar</a></button>
            </form>
            <br>

                    <table class="tabla" border="1">
        <tr>
            <th class="celda" colspan="6"> <h1>Pagos</h1> </th>
            
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
<?php foreach($conexion->query("SELECT p.id_pago, p.monto, p.fecha_pago, h.numero_habitacion, r.id_reservacion, c.nombre
FROM pagos p
INNER JOIN reservaciones r ON p.id_reservacion = r.id_reservacion
INNER JOIN clientes c ON c.id_cliente = r.id_cliente
INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion") as $row){?>
        <tr>
        <td hidden class="celda"> <?php echo $row['id_pago'] ?> </td>
        <td class="celda"> <?php echo $row['monto'] ?> </td>
        <td class="celda"> <?php echo $row['fecha_pago'] ?> </td>
        <td class="celda"> <?php echo $row['id_reservacion'] ?> </td>
        <td class="celda"> <?php echo $row['numero_habitacion'] ?> </td>
        <td class="celda"> <?php echo $row['nombre'] ?> </td>
            <!-- aqui la opcion de generar reporte -->


        <!-- <td class=""><a href="#?id=<?php echo $row['id_pago']?>"><i class="ri-file-fill"></i></a></td> -->
        <td class="edit"><?php echo '<a href="generar_ticket.php?id_pago=' . $row['id_pago'] . '"><i class="ri-file-fill op"></i></a>';  ?></td>
        </tr>
<?php }?>
    </table>
            <!-- fin de tabla -->
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