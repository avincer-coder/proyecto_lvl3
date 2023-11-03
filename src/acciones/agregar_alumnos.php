<?php 
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";
$Alumnos_controller = new alumnos_controller($con);
$Alumnos_controller->AgregarAlumnos(19203,'fansis','fansis.com','Lavel','2023-02-01');




?>