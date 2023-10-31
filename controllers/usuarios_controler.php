<?php
require_once "../models/usuarios_models.php"; 

class usuarios_controller{
    
    public function LeerUsuarios(){
        $usuario = new usuarios_models();
        $datos = $usuario->LeerUsuarios();
        return $datos;
    }
    
    public function ComprobarUsuario($correo){
        $UnUsuario = new usuarios_models();
        $respuesta = $UnUsuario->LeerUnUsuario($correo);
        return $respuesta;
    }

    public function CrearUsuarios(){}
    
    public function EditarUsuarios(){}
    
    public function EliminarUsuarios(){}
}
?>