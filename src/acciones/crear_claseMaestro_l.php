<?php
$materia = $_POST['clase'];
$maestro = $_POST['maestro'];

echo($maestro);
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";

$materias = new materias_controller($con);
$IdMateria =  $materias->AgregarMateria($materia);
echo($IdMateria);
echo('');
echo($maestro);
$materias->AgregarClaseMaestro($maestro, $IdMateria);

header('location:../views/clases_v.php');