<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

if ($tipo_usuario == "admin") {
    echo("Bienvenido comprobado que eres admin");
}else if($tipo_usuario  == "alumno"){
    header("location:index_alumno.php");
}else if($tipo_usuario == "maestro"){
    header("location:index_maestro.php");
}else{
    echo("Tu tipo de usuario no esta definido");
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