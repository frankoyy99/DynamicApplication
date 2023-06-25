<?php
  include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre'])&&isset($_SESSION['id_cargo'])){
?>
<!-- /////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Clientes</title>
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
    <!-- -------- SECCION DE LAS TABLAS------ -->
    <section class="home">
        <div class="home-conten">
                    <input class="bux" onkeyup="" type="text" name="buscar" id="buscar" placeholder="Buscar Registro">
                    <table class="tabla" id="clientes" border="0">
        <tr>
            <th class="celda" colspan="7"> <h1>Clientes</h1> </th>
            <th class="celda" colspan="2"> <h1>Opciones</h1> </th>
        </tr>
        <tr>
        <td hidden class="celda">Id Cliente</td>
        <td class="celda" >Nombre</td>
        <td class="celda" >Apellido Paterno</td>
        <td class="celda" >Apellido Materno</td>
        <td class="celda" >Edad</td>
        <td class="celda" >Domicilio</td>
        <td class="celda" >Telefono</td>
        <td class="celda" >Correo</td>
        <td class="new" colspan="2"><a href="nuevo_cliente.php"><i class="ri-user-add-fill op"></i></a></td>
        </tr>
        <?php
        $query = "SELECT * FROM clientes";
        foreach ($conexion->query($query) as $row) {
            ?>
<tr>
        <td hidden class="celda"> <?php echo $row['id_cliente'] ?> </td>
        <td class="celda"> <?php echo $row['nombre'] ?> </td>
        <td class="celda"> <?php echo $row['apellidop'] ?> </td>
        <td class="celda"> <?php echo $row['apellidom'] ?> </td>
        <td class="celda"> <?php echo $row['edad'] ?> </td>
        <td class="celda"> <?php echo $row['direccion'] ?> </td>
        <td class="celda"> <?php echo $row['telefono'] ?> </td>
        <td class="celda"> <?php echo $row['correo_electronico'] ?> </td>

        <td class="edit"><a href="editar_cliente.php?id=<?php echo $row['id_cliente']?>"><i class="ri-edit-fill op"></i></a></td>
        <td class="elim"><a href="elimina_cliente.php?id=<?php echo $row['id_cliente']?>" onclick="return eliminacion();"><i class="ri-delete-bin-4-fill op"></i></a></td>
</tr>
<?php }?>
    </table>
            <!-- ---------termina tabla------------- -->
        </div>
    </section>
    <!-- -----------seccion de home y todo lo que lleva---------------- -->
    <script src="javascript/index.js"></script>
</body>
</html>
<?php
    }else {
        header("location:sesion.php");
    }
?>