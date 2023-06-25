<?php
include("conexion.php");
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    $id=$_GET["id"];
    $usuarios="SELECT * FROM habitaciones WHERE id_habitacion='$id'";
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
    <title>Editar habitacion</title>
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
        <?php
    $resultados=mysqli_query($conexion,$usuarios);
    while ($row=mysqli_fetch_assoc($resultados)) {
    ?>
    <form action="actualizar_habitacion.php" method="post" onsubmit="return usuario(this);">
        <table class="tabla" border="1">
            <tr>
                <th class="celda" colspan="2" ><h1>Edicion de Regitro Habitacion</h1></th>
                <td hidden><input type="hidden" value="<?php echo $row['id_habitacion'] ?>" name="id"></td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Numero Habitacion:</label><br><input type="text" name="numero_habitacion" id="numero_habitacion" value="<?php echo $row['numero_habitacion'] ?>"></div><br></td>
                <td class="celda"><div><label for="">Tipo Habitacion</label><br>
                <select class="custom-select" name="tipo_habitacion" id="tipo_habitacion">
                    <option value="Individual" <?php if ($row['tipo_habitacion'] == "Individual") { echo 'selected'; } ?>>Individual</option>
                    <option value="Doble" <?php if ($row['tipo_habitacion'] == "Doble") { echo 'selected'; } ?>>Doble</option>
                    <option value="Familiar" <?php if ($row['tipo_habitacion'] == "Familiar") { echo 'selected'; } ?>>Familiar</option>
                </select></div><br></td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Precio Noche</label><br><input type="text" name="precio_noche" id="precio_noche" placeholder="" value="<?php echo $row['precio_noche'] ?>"></div><br></td>
                <td class="celda" colspan="2">
                    <div class="contenedor"><label for="">Disponibilidad:</label><br>
                <input type="radio" name="disponibilidad" id="disponibilidad" <?php echo $row['disponible'] =="1" ?'checked':''?> value="1">Disponible
                <input type="radio" name="disponibilidad" id="disponibilidad"<?php echo $row['disponible']=="0" ?'checked':''?> value="0">No Disponible
                    </div><br>
                </td>
            </tr>
            <tr>
            <?php }?>
                <td class=""><button type="submit"><i class="ri-save-2-fill otros"></i></button></td>
                <td class="btn"><a href="habitaciones.php"><i class="ri-arrow-go-back-line otros"></i></a></td>
            </tr>
        </table>
    </form>
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