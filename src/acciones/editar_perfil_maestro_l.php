<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los valores de los campos del formulario
    $correo = $_POST["correo"];
    $password = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
}

require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";
$copia_clase = new usuarios_controller($con);
$copia_clase->EditarUsuario($correo,$nombre,$password,$apellido,$direccion,$fecha_nacimiento);
?>