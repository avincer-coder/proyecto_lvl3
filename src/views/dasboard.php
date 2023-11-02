<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

switch($tipo_usuario){

    case "admin":
    echo("<p>Soy administrador</p>");
    break;
    
    case "alumno":
    echo("<p>Soy alumnooooo</p>");
    break;
    
    case "maestro":
    echo("<p>Soy maestroooo >/p>");
    break;

    default:
    echo("<p>Usuario desconocido</p>");
    break;
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Menu administracion</h1>
        <a href="">Permisos</a>
        <a href="">Maestros</a>
        <a href="index_alumno.php">Alumnos</a>
        <a href="">Clases</a>
    </nav>
</body>
</html>