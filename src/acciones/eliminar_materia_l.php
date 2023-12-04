<?php 
$id = $_POST["id_materia"];

require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";
$controller_alumno = new alumnos_controller($con);
$Eliminar = $controller_alumno->EliminarMateria($id);
header("location:../views/administra_clases_v.php");
// revisar encaso de no seleccionar nada 
?>