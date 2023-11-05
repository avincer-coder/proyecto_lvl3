<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

$html_roll;
switch($tipo_usuario){

    case "admin":
        $html_roll = "<p>Soy administrador</p>";
    break;
    
    case "alumno":
        header("location:../index.php");
    break;
    
    case "maestro":
        header("location:../index.php");
    break;

    default:
        header("location:../index.php");
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
    <form action="../acciones/agregar_maestros_l.php " method="post">
        <label for="email">Correo Electronico</label>
        <input name="email" id="email" type="email">

        <label for="nombre">Nombre(s)</label>
        <input name="nombre" id="nombre" type="text">
        
        <label for="apellido">Apellido(s)</label>
        <input name="apellido" id="apellido" type="text">

        <label for="direccion">Dirección</label>
        <input name="direccion" id="direccion" type="text">

        <label for="fecha">Fecha de Nacimiento</label>
        <input name="fecha" id="fecha" type="date">

        <label for="clase">Clase Asignada</label>
        <input name="clase" id="clase" type="text">
        <input type="submit">
    </form>
    
</body>
</html>