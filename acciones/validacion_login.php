<?php 
if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];

    require_once "../controllers/usuarios_controler.php";
    $usuario_prueba = new usuarios_controller();
    $data_usuario = $usuario_prueba->ComprobarUsuario($correo);
    echo($data_usuario);



}else{
    echo("Hubo un error con los campos correo y password revisalos y manda los campos llenos");
}



?>