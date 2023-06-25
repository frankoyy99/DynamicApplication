<?php
include("conexion.php");
    $id=$_GET["id"];
    $habitacion="SELECT r.*, h.numero_habitacion, h.tipo_habitacion, h.precio_noche, h.disponible, c.nombre, c.apellidop, c.apellidom, c.edad, c.direccion, c.telefono, c.correo_electronico
    FROM reservaciones r
    INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion
    INNER JOIN clientes c ON r.id_cliente = c.id_cliente WHERE id_reservacion='$id'";
    session_start();
    $usuario = $_SESSION['nombre'];
    $row=$_SESSION['id_cargo'];
    if(isset($_SESSION['nombre']) && isset($_SESSION['id_cargo'])){
?>
<!-- ------------------ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Edicion reservacion</title>
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
    $resultados=mysqli_query($conexion,$habitacion);
    while ($row=mysqli_fetch_assoc($resultados)) {
    //print_r($row);
    ?>
    <form action="actualiza_reservacion.php" method="post" onsubmit="return reservacion(this);">
        <table  class="tabla" border="1">
            <tr>
                <th class="celda" colspan="3"><h1>Edicion de Reservacion</h1></th>
            </tr>
            <tr>
            <td hidden><input type="hidden" value="<?php echo $row['id_reservacion'] ?>" name="id"></td>
            <?php 
            $fechaMinima=$row['fecha_entrada'];
            $fechaMaxima=$row['fecha_salida'];
            if (strtotime($fechaMinima) > strtotime($fechaMaxima)) {
                // Intercambiar las fechas si es necesario
                $temp = $fechaMinima;
                $fechaMinima = $fechaMaxima;
                $fechaMaxima = $temp;
            }
            ?>
                <td class="celda"><div class="contenedor"><label for="">Fecha Inicio:</label><br><input class="custom-date-input" type="date" name="fechai" id="fechai" placeholder="" min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" value="<?php echo $row['fecha_entrada']; ?>"></div></td>
                <td class="celda"><div class="contenedor"><label for="">Fecha Fin:</label><br><input class="custom-date-input" type="date" name="fechaf" id="fechaf" placeholder="" min="<?php $hoy=date('Y-m-d', strtotime($fechaMinima . ' +1 day')); echo $hoy;?>" value="<?php echo $row['fecha_salida']; ?>"></div></td>
            </tr>
            <tr>
            <td class="celda"><div><label for="">Habitacion:</label><br>

            <?php
        $sql_habitaciones = "SELECT * FROM habitaciones";
        $resultado_habitaciones = mysqli_query($conexion, $sql_habitaciones);
    ?>

            <select class="custom-select" name="habitacion" id="habitacion">
            <?php while ($habitacion = mysqli_fetch_assoc($resultado_habitaciones)) { ?>
                <option value="<?php echo $habitacion['id_habitacion']; ?>" data-precio="<?php echo $habitacion['precio_noche'] ?>" <?php if ($habitacion['id_habitacion'] == $row['id_habitacion']) { echo 'selected'; } ?>><?php echo 'N°'.$habitacion['numero_habitacion'] . '~' . $habitacion['tipo_habitacion']. ' $' . $habitacion['precio_noche']; ?></option>
            <?php } ?>
        </select>

                </div></td>
                <td class="celda"><div class="contenedor"><label for="">Cliente:</label><br>
                <?php
                // Obtener la información de los clientes
        $sql_clientes = "SELECT * FROM clientes";
        $resultado_clientes = mysqli_query($conexion, $sql_clientes);
                ?>
                <select class="custom-select" name="cliente" id="" required>
                <?php while ($cliente = mysqli_fetch_assoc($resultado_clientes)) { ?>
                <option value="<?php echo $cliente['id_cliente']; ?>" <?php if ($cliente['id_cliente'] == $row['id_cliente']) { echo 'selected'; } ?>><?php echo $cliente['nombre'] . ' ' . $cliente['apellidop'] . ' ' . $cliente['apellidom']; ?></option>
            <?php } ?>
                </select>
                </div></td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Numero de huespedes:</label><br>
                <select class="custom-select" name="huespedes" id="" required>
                    <option value="1" <?php if ($row['numero_huespedes'] == 1) { echo 'selected'; } ?>>1</option>
                    <option value="2" <?php if ($row['numero_huespedes'] == 2) { echo 'selected'; } ?>>2</option>
                    <option value="3" <?php if ($row['numero_huespedes'] == 3) { echo 'selected'; } ?>>3</option>
                    <option value="4" <?php if ($row['numero_huespedes'] == 4) { echo 'selected'; } ?>>4</option>
                </select>
                </td>
                <td class="celda"><div><label for="">Pago Total:</label><br>
                <input name="pago_total" type="text" id="pago_total" value="<?php echo $row['pago_total']; ?>" readonly>
                </td>
            </tr>
            <tr>
            <?php }?>
                <td class=""><button type="submit"><i class="ri-save-2-fill otros"></i></button></td>
                <td class="btn"><a href="reservaciones.php"><i class="ri-arrow-go-back-line otros"></i></a></td>
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
<script>
  var fechaEntrada = document.getElementById("fechai");
  var fechaSalida = document.getElementById("fechaf");
  var pagoTotal = document.getElementById("pago_total");

  // Agregar un evento para detectar los cambios en las fechas de entrada y salida
  fechaEntrada.addEventListener("change", calcularPagoTotal);
  fechaSalida.addEventListener("change", calcularPagoTotal);

  function calcularPagoTotal() {
    var fechaInicio = new Date(fechaEntrada.value);
    var fechaFin = new Date(fechaSalida.value);
    var diferenciaTiempo = fechaFin.getTime() - fechaInicio.getTime();
    var dias = Math.ceil(diferenciaTiempo / (1000 * 3600 * 24));
    var habitacion = document.getElementById("habitacion");
    var precioNoche = habitacion.options[habitacion.selectedIndex].dataset.precio;
    var pago = dias * parseFloat(precioNoche);
    pagoTotal.value = pago.toFixed(2);
  }
</script>