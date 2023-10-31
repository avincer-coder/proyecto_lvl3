<?php 
if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    require_once "../controllers/usuarios_controler.php";
    $usuario_prueba = new usuarios_controller();
    $data_usuario = $usuario_prueba->ComprobarUsuario($correo);

    if ($data_usuario) {
        $validacionContraseña = $usuario_prueba->ValidarContraseña($correo, $password);
        if ($validacionContraseña) {
            session_start();
            $_SESSION["usuario"] = "admin";
            $_SESSION["nombre"] = "admin";
            header("location:../views/index_admin.php");
        }else{
            echo("Contraseña Incorrecta");
        }


    }else{
        echo("Tu correo es invalido");
    }


}else{
    echo("Hubo un error con los campos correo y password revisalos y manda los campos llenos");
}



?>