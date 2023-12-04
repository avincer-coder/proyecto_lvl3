<?php
$materia = $_POST['clase'];
$maestro = $_POST['maestro'];
$IdMaestroMateria = $_POST['IdMaestroMateria'];

echo($maestro);
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";

$materias = new materias_controller($con);
$materias->EditarClase($maestro, $IdMaestroMateria);
header('location:../views/clases_v.php');