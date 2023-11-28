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
            $roll = $usuario_prueba->ObtenerRoll($correo, $password);
            $nombre = $usuario_prueba->ObtenerNombre($correo, $password);
            session_start();
            $_SESSION["nombre"] = $nombre;
            $_SESSION["tipo_usuario"] = $roll;
            $_SESSION["correo"] = $correo;
          
            header("location:../views/dashboard.php");



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