<?php 
require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";
$copia_clase = new usuarios_controller($con);

session_start();
$correoDos = $_SESSION["correo"];

$buscar_usuario = $copia_clase->BuscarUsuario($correoDos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../acciones/editar_perfil_maestro_l.php" method="post">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $buscar_usuario[0]["correo"] ?>" readonly><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo $buscar_usuario[0]["password"] ?>"><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $buscar_usuario[0]["nombre"] ?>"><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $buscar_usuario[0]["apellido"] ?>"><br>

        <label for="direccion"> Dirección:</label>
        <input type = "text" id = "direccion" name = "direccion" value = "<?php echo $buscar_usuario[0]["direccion"] ?>"><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $buscar_usuario[0]["fecha_nacimiento"] ?>"><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>