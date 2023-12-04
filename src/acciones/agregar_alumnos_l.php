<?php 
$DNI = $_POST["dni"];
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];
$password = $_POST["contraseña"];

require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";

$alumnos_controller = new alumnos_controller($con);
$alumnos_controller->AgregarAlumno($DNI, $nombre,$correo,$direccion, $fecha, $password, $apellido);

// Modificar nombre de agruegar:maestros a agregar_usuarios
header("location:../views/index_admin.php");


?>