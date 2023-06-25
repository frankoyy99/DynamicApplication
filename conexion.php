<?php
$servidor="localhost";
$usuario="root";
$contra="";
$bd="hotel";
$conexion=new mysqli($servidor,$usuario,$contra,$bd);
if (!$conexion) {
    die("ERROR DE CONEXION!!!".mysqli_connect_error());
}
?>