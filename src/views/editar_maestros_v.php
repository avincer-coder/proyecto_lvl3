<?php 
require_once "../controllers/maestros_controller.php";
require_once "../config/config_alumno.php";
$controller_maestro = new maestros_controller($con);
$correo = $_POST["input_correo"];
$Maestro = $controller_maestro->BuscarMaestro($correo);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../acciones/editar_maestros_l.php " method="post">
        <label for="email">Correo Electronico</label>
        <input value="<?php echo($Maestro[0]["email"]); ?>" name="email" id="email" type="email">

        <label for="nombre">Nombre(s)</label>
        <input value="<?php echo($Maestro[0]["nombre"]); ?>" name="nombre" id="nombre" type="text">
        
        <label for="apellido">Apellido(s)</label>
        <input name="apellido" id="apellido" type="text">

        <label for="direccion">Dirección</label>
        <input value="<?php echo($Maestro[0]["direccion"]); ?>" name="direccion" id="direccion" type="text">

        <label for="fecha">Fecha de Nacimiento</label>
        <input value="<?php echo($Maestro[0]["fecha"]); ?>" name="fecha" id="fecha" type="date">

        <label for="clase">Clase Asignada</label>
        <input value="<?php echo($Maestro[0]["clase"]); ?>" name="clase" id="clase" type="text">
        <input type="submit">
    </form>
</body>
</html>