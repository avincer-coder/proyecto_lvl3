<?php
require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";
$controller_usuarios = new usuarios_controller($con);
$DNI = $_POST["id_alumno"];
$controller_usuarios->EliminarUsuario($DNI);




echo($DNI);
header("location:../views/index_admin.php");
?>