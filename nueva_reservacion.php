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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Nueva Reservacion</title>
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
            <!-- --------inicio tabla--------- -->
        <form  action="agregar_reservacion.php" method="post" onsubmit="return validarFormatoSalida(this);">
        <table class="tabla" border="1">
            <tr>
                <th class="celda" colspan="3"><h1>Nueva Reservacion</h1></th>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Fecha de Entrada:</label><br>
                <input class="custom-date-input" type="date" name="fechai" id="fechai" required placeholder="" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" ></div></td>
                <td class="celda"><div><label for="">Fecha de Salida:</label><br>
                <input class="custom-date-input" type="date" name="fechaf" id="fechaf" required placeholder="" min="<?php $hoy=date("Y-m-d", strtotime($hoy . " +1 day")); echo $hoy;?>" ></div></td>
            </tr>
            <tr>
            <td class="celda"><div><label for="">N° Habitacion:</label><br>
                    <select class="custom-select" name="habitacion" id="habitacion" required>
                    <option value="">Selecciona una opción</option>
                        <?php
                    $link=new PDO("mysql:host=localhost;dbname=hotel","root","");
                    ?>
                    <?php
                 foreach($link->query("SELECT DISTINCT id_habitacion,numero_habitacion,tipo_habitacion,precio_noche FROM habitaciones")as $row){?>
                    <!-- <option value="<?php echo $row['id_habitacion'] ?>"><?php echo $row['numero_habitacion']?></option> -->
                    <option value="<?php echo $row['id_habitacion'] ?>" data-precio="<?php echo $row['precio_noche'] ?>"><?php echo 'N°'.$row['numero_habitacion'] . '~' . $row['tipo_habitacion']. ' $' . $row['precio_noche']; ?></option>
                    <?php }?>
                    </select>
                </div></td>
                <td class="celda"><div><label for="">ID cliente:</label><br>
                <select class="custom-select" name="cliente" id="" required>
                <option value="">Selecciona una opción</option>
                <?php
                    $link=new PDO("mysql:host=localhost;dbname=hotel","root","");
                    ?>
                <?php foreach($link->query("SELECT DISTINCT id_cliente,nombre,apellidop,apellidom FROM clientes")as $row){?>
                <option value="<?php echo $row['id_cliente'] ?>"><?php echo $row['nombre']." ".$row['apellidop']." ".$row['apellidom']."" ?></option>
                <?php }?>
                </select></div></td>
            </tr>
            <tr>
                <td class="celda"><div><label for="">Numero de Huespedes:</label><br><select class="custom-select" name="huespedes" id="huespedes">
                    <option value="">Selecciona una opción</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select></div></td>
                <td class="celda"><div><label for="">Pago total:</label><br>
                <input name="pago_total" id="pago_total" type="text" value="" readonly>
                </td>
            </tr>
            <tr>
                <td class=""><button type="submit"><i class="ri-save-2-fill otros"></i></button></td>
                <td class="btn"><a href="reservaciones.php"><i class="ri-arrow-go-back-line otros"></i></a></td>
            </tr>
        </table>
    </form>
    <!-- --------------termina tabla------------ -->
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