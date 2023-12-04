<?php 
$email = $_POST["email"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];
$password = $_POST["contraseña"];
$DNI = $_POST['DNI'];
$materias = $_POST['clase'];

require_once "../controllers/maestros_controller.php";
require_once "../config/config_admin.php";

$maestros_controller = new maestros_controller($con);
$maestros_controller->AgregarMaestros($DNI, $nombre,$email,$direccion, $fecha, $password, $apellido);

require_once "../controllers/materias_controller.php";
$materias_controller = new materias_controller($con);
$materias_controller->AgregarClaseMaestro($DNI, $materias);

// Verificar si el DNI es repetido
header("location:../views/maestros_v.php")
?>