<?php 
$DNI = $_POST['DNI'];
echo($DNI);



// $id = $_POST["id_materia"];

require_once "../controllers/maestros_controller.php";
require_once "../config/config_admin.php";
$controller_maestros = new maestros_controller($con);
$Eliminar = $controller_maestros->EliminarMaestro($DNI);
header("location:../views/maestros_v.php");






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eliminar Maestros</h1>
    <button>
        <a href="../views/maestros_v.php">Regresar</a>
    </button>
</body>
</html>