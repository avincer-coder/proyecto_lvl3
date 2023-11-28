<?php 
$clase = $_POST['clases'];
$id_alumno = $_POST['id_alumno'];

require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";
$controller_alumno = new alumnos_controller($con);
$controller_alumno->AgregarClaseAlumno($id_alumno, $clase);
?>