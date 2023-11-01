<?php
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_alumno.php";
$controller_alumno = new alumnos_controller($con);
$correo_input = $_POST["input_correo"];
$controller_alumno->EliminarAlumnos($correo_input);




echo($correo_input);
?>