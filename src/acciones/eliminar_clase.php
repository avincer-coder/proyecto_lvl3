<?php 
$id = $_POST["eliminar_clase"];
require_once "../controllers/clase_controller.php";
require_once "../config/config_admin.php";
$clase = new clase_controller($con);
$Eliminar = $clase->EliminarClase($id);
echo($id);
header("location:../views/clases_v.php");
// revisar encaso de no seleccionar nada
?>