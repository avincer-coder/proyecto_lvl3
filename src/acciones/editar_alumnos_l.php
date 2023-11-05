<?php 
 

$dni = $_POST["dni"];
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];


require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";
$Alumnos_controller = new alumnos_controller($con);
$Alumnos_controller->EditarAlumnos($dni,$nombre,$apellido, $correo, $direccion,$fecha);
?>