<?php 
$DNI = $_POST["DNI"];
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];
$password = $_POST["contraseña"];

require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";
$usuarios_controller = new usuarios_controller($con);
$usuarios_controller->EditarUsuario($DNI, $nombre,$password,$apellido,$direccion,$fecha);
header("location:../views/index_admin.php")
?>