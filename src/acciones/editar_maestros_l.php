<?php 
$clase = $_POST["clase"];
$email = $_POST["email"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];


require_once "../controllers/maestros_controller.php";
require_once "../config/config_admin.php";
$Maestros_controller = new maestros_controller($con);
$Maestros_controller->EditarMaestros($nombre,$email,$direccion, $fecha, $clase);
header("location:../views/maestros_v.php")
?>