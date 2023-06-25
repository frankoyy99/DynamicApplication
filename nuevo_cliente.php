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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css" rel="stylesheet">
    <title>Nuevo Cliente</title>
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
            <!-- comienza tabla -->
        <form action="agregar_cliente.php" method="post" onsubmit="return formulario(this);">
        <table class="tabla" border="1">
            <tr>
                <th class="celda" colspan="2"><h1>Nuevo Cliente</h1></th>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Nombre:</label><br><input type="text" name="nombre" id="nombre" placeholder="" onkeyup="validarNombre()"></div>
                <span id="mensajeNombre"></span>
            </td>
                <td class="celda"><div><label for="">Apellido Paterno:</label><br><input type="text" name="apellidop" id="apellidop" placeholder="" onkeyup="validarApellidoPaterno()"></div>
                <span id="mensajeApellidop"></span>
            </td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Apellido Materno:</label><br><input type="text" name="apellidom" id="apellidom" placeholder="" onkeyup="validarApellidoMaterno()"></div>
                <span id="mensajeApellidom"></span>
            </td>
                <td class="celda"><div><label for="">Edad:</label><br><input type="text" name="edad" id="edad" placeholder="" onkeyup="validarEdad()"></div>
                <span id="mensajeEdad"></span>
            </td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Domicilio:</label><br><input type="text" name="domicilio" id="domicilio" placeholder="" onkeyup="validarDomicilio()"></div>
                <span id="mensajeDomicilio"></span>
            </td>
                <td class="celda"><div><label for="">Telefono:</label><br><input type="tel" name="telefono" id="telefono" placeholder="" onkeyup="validarTelefono()"></div>
                <span id="mensajeTelefono"></span>
            </td>
            </tr>
            <tr>
                <td class="celda" colspan="2"><div><label for="">Correo:</label><br><input type="email" name="correo" id="correo" placeholder="" onkeyup="validarCorreo()"></div>
                <br>
                <span id="mensajeCorreo"></span>
            </td>
            </tr>
            <tr>
                <td class=""><button type="submit"><i class="ri-save-2-fill otros"></i></button></td>
                <td class="btn"><a href="clientes.php"><i class="ri-arrow-go-back-line otros"></i></a></td>
            </tr>
        </table>
    </form>
    <!-- termina tablas -->
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