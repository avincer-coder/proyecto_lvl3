<?php 
$clase = $_POST["clase"];

$materias = $_POST["clase"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$DNI = $_POST['DNI'];
$password = $_POST['password'];

require_once "../controllers/maestros_controller.php";
require_once "../controllers/materias_controller.php";
require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";




$usuarios_controller = new usuarios_controller($con);
$usuarios_controller->EditarUsuario($DNI, $nombre,$password,$apellido,$direccion,$fecha_nacimiento);


$materias_controller = new materias_controller($con);
$materias_controller->EditarClaseMaestro($materias, $DNI);




header("location:../views/maestros_v.php")
?>