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

    public function ObtenerNombre($correo, $contraseña){
        $UnUsuario = new usuarios_models();
        $respuesta = $UnUsuario->LeerContraseña($correo);
        
        foreach($respuesta as $cada_usuario){
            if ($contraseña==$cada_usuario["password"]) {
                $nombre = $cada_usuario["nombre"];
                return $nombre;
            }else{
                return 0;
            }
        }
    }

    public function ObtenerDNI($correo, $contraseña){
        $UnUsuario = new usuarios_models();
        $respuesta = $UnUsuario->LeerContraseña($correo);
        
        foreach($respuesta as $cada_usuario){
            if ($contraseña==$cada_usuario["password"]) {
                $nombre = $cada_usuario["DNI"];
                return $nombre;
            }else{
                return 0;
            }
        }
    }

    public function CrearUsuarios(){}
    
    public function EditarUsuario($DNI, $nombre,$password,$apellido,$direccion,$fecha_nacimiento)
    {
        $UnUsuario = new usuarios_models();
        $actualiazr_alumno = $UnUsuario->EditarUsuarios($DNI, $nombre,$password,$apellido,$direccion,$fecha_nacimiento);
        echo($actualiazr_alumno);
    }

    

    public function BuscarUsuario($correo)
    {
        $usuario = new usuarios_models();
        $Data = $usuario->BuscarUsuario($correo);
        return $Data;
    }

    public function EliminarUsuario($DNI)
    {
        $usuario = new usuarios_models();

        $usuario->EliminarUsuario($DNI);
    }
    
}
?>