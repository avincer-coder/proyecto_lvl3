<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

if ($tipo_usuario == "admin") {
    header("location:index_admin.php");
}else if($tipo_usuario  == "alumno"){
    echo("Bienvenido alumnooooooo ");
}else if($tipo_usuario == "maestro"){
    header("location:index_maestro.php");
}else{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
</body>
</html>