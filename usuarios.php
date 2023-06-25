<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre'])&&isset($_SESSION['id_cargo'])==1){
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
    <title>Usuarios</title>
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
                    <li class="nav-links">
                        <a href="usuarios.php">
                        <i class="ri-shield-user-fill icon"></i>
                        <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>
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
            <!-- inicia tabla -->
            <input class="bux" onkeyup="" type="text" name="buscar" id="buscar" placeholder="Buscar Registro">
    <table class="tabla" id="usuarios" border="1">
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
<?php foreach($conexion->query("SELECT e.*, c.nombre_cargo
FROM empleados e
JOIN cargo c ON e.id_cargo = c.id_cargo")as $row){?>
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
<?php }?>
    </table>
            <!-- termmina tablas -->
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