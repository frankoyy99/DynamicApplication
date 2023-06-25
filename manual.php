<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre'])&&isset($_SESSION['id_cargo'])){
?>
            <!-- <li><a href="#"><?php echo"Usuario: [".$row['id_cargo']."] Administrador"?></a></li> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Manual de usuario</title>
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
            <!-- ----------------- -->
            <h1>Manual de Usuario - Sistema</h1>
            <p>Bienvenido al manual de usuario de nuestra aplicación.</p>
            <br>
            <br>
    <h2>Índice</h2>
    <ul class="indice" id="indice">
        <li><a href="#clientes">Módulo de Clientes</a></li>
        <li><a href="#habitaciones">Módulo de Habitaciones</a></li>
        <li><a href="#reservaciones">Módulo de Reservaciones</a></li>
        <li><a href="#usuarios">Módulo de Usuarios</a></li>
        <li><a href="#pagos">Módulo de Pagos</a></li>
    </ul>
    <br>
    <br>
    <h2 id="clientes">Módulo de Clientes</h2>
    <h3>Funciones</h3>
    <br>
    <ul class="indice">
      <li>Agregar cliente: Permite agregar un nuevo cliente al sistema.</li>
      <img src="css/image/nuevo_cliente.PNG" alt="Introducción" height="200">
      <li>Eliminar cliente: Permite eliminar un cliente existente del sistema.</li>
      <img src="css/image/elimina_cliente.PNG" alt="Introducción" height="200">
      <li>Visualizar cliente: Muestra la información de un cliente específico.</li>
      <img src="css/image/clientes.PNG" alt="Introducción" height="200">
        <li>Actualizar cliente: Permite actualizar la información de un cliente existente.</li>
        <img src="css/image/actualiza_cliente.PNG" alt="Introducción" height="200">
        <li>Buscar cliente: Permite buscar clientes en base a ciertos criterios los cuales son los campos nombre, apellido materno y apellido paterno.</li>
        <img src="css/image/busca_cliente.PNG" alt="Introducción" height="200">
        <li><a href="#indice">Volver al Índice</a></li>
    </ul>
    <br>
    <br>
    <h2 id="habitaciones">Módulo de Habitaciones</h2>
    <h3>Funciones</h3>
    <ul class="indice">
        <li>Agregar habitación: Permite agregar una nueva habitación al sistema.</li>
        <img src="css/image/nueva_habitacion.PNG" alt="Introducción" height="200">
        <li>Eliminar habitación: Permite eliminar una habitación existente del sistema.</li>
        <img src="css/image/elimina_habitacion.PNG" alt="Introducción" height="200">
        <li>Visualizar habitación: Muestra la información de una habitación específica.</li>
        <img src="css/image/habitaciones.PNG" alt="Introducción" height="200">
        <li>Actualizar habitación: Permite actualizar la información de una habitación existente.</li>
        <img src="css/image/actualiza_habitacion.PNG" alt="Introducción" height="200">
        <li>Buscar habitación: Permite buscar habitaciones en base a ciertos criterios los cuales son los campos numero de habitacion, tipo de habitacion y el estado de la habitacion.</li>
        <img src="css/image/busca_habitaciones.PNG" alt="Introducción" height="200">
        <li><a href="#indice">Volver al Índice</a></li>
    </ul>
    <br>
    <br>
    <h2 id="reservaciones">Módulo de Reservaciones</h2>
    <h3>Funciones</h3>
    <ul class="indice">
        <li>Realizar reservación: Permite realizar una nueva reservación.</li>
        <img src="css/image/nueva_reservacion.PNG" alt="Introducción" height="200">
        <li>Visualizar reservación: Muestra la información de una reservación específica.</li>
        <img src="css/image/reservaciones.PNG" alt="Introducción" height="200">
        <li>Actualizar reservación: Permite actualizar la información de una reservación existente.</li>
        <img src="css/image/edicion_reservacion.PNG" alt="Introducción" height="200">
        <li>Buscar reservación: Permite buscar reservaciones en base a ciertos criterios los cuales son los campos numero de habitacion, fecha entraday  fecha salida, .</li>
        <img src="css/image/busca_reservacion.PNG" alt="Introducción" height="200">
        <li><a href="#indice">Volver al Índice</a></li>
    </ul>
    <br>
    <br>
    <h2 id="usuarios">Módulo de Usuarios</h2>
    <h3>Funciones</h3>
    <ul class="indice">
        <li>Agregar usuario: Permite agregar un nuevo usuario al sistema.</li>
        <img src="css/image/nuevo_usuario.PNG" alt="Introducción" height="200">
        <li>Eliminar usuario: Permite eliminar un usuario existente del sistema.</li>
        <img src="css/image/elimina_usuario.PNG" alt="Introducción" height="200">
        <li>Visualizar usuario: Muestra la información de un usuario específico.</li>
        <img src="css/image/usuarios.PNG" alt="Introducción" height="200">
        <li>Actualizar usuario: Permite actualizar la información de un usuario existente.</li>
        <img src="css/image/editar_usuario.PNG" alt="Introducción" height="200">
        <li>Buscar usuario: Permite buscar usuarios en base a ciertos criterios los cuales son los campos de nombre usuario y el cargo que posee.</li>
        <img src="css/image/busca_usuario.PNG" alt="Introducción" height="200">
        <li><a href="#indice">Volver al Índice</a></li>
    </ul>

    <h2 id="pagos">Módulo de Pagos</h2>
    <h3>Funciones</h3>
    <ul class="indice">
        <li>Visualizar pago: Muestra la información de un pago específico.</li>
        <img src="css/image/pagos.PNG" alt="Introducción" height="200">
        <li>Buscar pago: Permite buscar pagos en base a ciertos criterios los cuales son los campos de fecha.</li>
        <img src="css/image/busca_pagos.PNG" alt="Introducción" height="200">
        <li><a href="#indice">Volver al Índice</a></li>
    </ul>
            <!-- ----------------- -->
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