<?php 
$clase = $_POST["clase"];
$email = $_POST["email"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];

require_once "../controllers/maestros_controller.php";
require_once "../config/config_admin.php";
$maestros_controller = new maestros_controller($con);
$maestros_controller->AgregarMaestros($nombre,$email,$direccion, $fecha, $clase);
// Dar un mensaje si lo hizo bien o lo hizo mal
header("location:../views/maestros_v.php")

?>