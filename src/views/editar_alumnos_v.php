<?php 
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_alumno.php";
$controller_alumno = new alumnos_controller($con);
$correo = $_POST["input_correo"];
$Alumno = $controller_alumno->BuscarAlumno($correo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../acciones/editar_alumnos_l.php" method="post">
        <label for="dni">DNI</label>
        <input value="<?php echo($Alumno[0]["DNI"]); ?>" name="dni" id="dni" type="number">

        <label for="correo">Correo Electronico</label>
        <input value="<?php echo($Alumno[0]["correo"]); ?>" name="correo" id="correo" type="email">
        
        <label for="nombre">Nombre(s)</label>
        <input value="<?php echo($Alumno[0]["nombre"]); ?>" name="nombre" id="nombre" type="text">

        <label for="apellido">Apellido(s)</label>
        <input value="<?php echo($Alumno[0]["apellido"]); ?>" name="apellido" type="text">

        <label for="direccion">Direccion</label>
        <input value="<?php echo($Alumno[0]["direccion"]); ?>" name="direccion" id="direccion" type="text">

        <label for="fecha">Fecha de nacimiento</label>
        <input value="<?php echo($Alumno[0]["fecha"]); ?>" name="fecha" id="fecha" type="date">
        <input type="submit">
    </form>
</body>
</html>