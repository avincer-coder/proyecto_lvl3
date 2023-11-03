<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

$html_roll;
switch($tipo_usuario){

    case "admin":
        $html_roll = "<p>Soy administrador</p>";
    break;
    
    case "alumno":
        $html_roll = "<p>Soy alumno</p>";
    break;
    
    case "maestro":
        $html_roll = "<p>Soy maestro</p>";
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
    <div>
        <div>Logo</div>
        <div><?php echo($html_roll) ?></div>
        <nav>
            <h1>Menu administracion</h1>
            <a href="">Permisos</a>
            <a href="">Maestros</a>
            <a href="index_alumno.php">Alumnos</a>
            <a href="">Clases</a>
        </nav>
        <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </div>
</body>
</html>