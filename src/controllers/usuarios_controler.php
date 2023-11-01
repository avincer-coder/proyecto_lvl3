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
    
    public function ValidarContraseña($correo, $contraseña){
        $UnUsuario = new usuarios_models();
        $respuesta = $UnUsuario->LeerContraseña($correo);
        
        foreach($respuesta as $cada_usuario){
            // echo($cada_usuario["roll"]);
            if ($contraseña==$cada_usuario["password"]) {
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function ObtenerRoll($correo, $contraseña){
        $UnUsuario = new usuarios_models();
        $respuesta = $UnUsuario->LeerContraseña($correo);
        
        foreach($respuesta as $cada_usuario){
            if ($contraseña==$cada_usuario["password"]) {
                $roll = $cada_usuario["roll"];
                return $roll;
            }else{
                return 0;
            }
        }
    }


    public function CrearUsuarios(){}
    
    public function EditarUsuarios(){}
    
    
}
?>