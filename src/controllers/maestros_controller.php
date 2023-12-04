<?php
require_once "../models/maestros_models.php"; 


class maestros_controller{
    
    public $con;
    public $maestro;

    public function __construct(PDO $con)
    {
        $this->con = $con;
        $maestro = new maestros_models($this->con);
        $this->maestro = $maestro;
    }

    public function LeerUsuariosMaestros()
    {
        $maestro = new maestros_models($this->con);
        $datos = $maestro->LeerUsuariosMaestros();
        return $datos;
    }
    

    public function LeerMaestros(){
        $maestro = new maestros_models($this->con);
        $datos = $maestro->LeerMaestros();
        return $datos;
    }

    
//segunda tabla para leer y poder eliminar
    public function LeerMaestrosEliminar()
    {
        $maestro = new maestros_models($this->con);
        $datos_eliminar = $maestro->LeerMaestrosEliminar();
        return $datos_eliminar;
    }

    // public function EliminarAlumnos($correo){
    //     $EliminarUsuario = new alumnos_models($this->con);
    //     $EliminarUsuario->EliminarAlumnos($correo);
    // }
    
    public function AgregarMaestros($DNI, $nombre,$email,$direccion, $fecha,  $password, $apellido){
        $AgregarMaestro = new maestros_models($this->con);
        $AgregarMaestro->AgregarMaestro($DNI, $nombre,$email,$direccion, $fecha, $password, $apellido);
    }
    
    public function EditarMaestros($nombre,$email,$direccion, $fecha, $clase)
    {
        $EditarMaestros = new maestros_models($this->con);
        $actualiazr_maestro = $EditarMaestros->EditarMaestros($nombre,$email,$direccion, $fecha, $clase);
        echo($actualiazr_maestro);
    }

    public function BuscarMaestro($correo)
    {
        $BuscarMaestro = new maestros_models($this->con);
        $Data = $BuscarMaestro->BuscarMaestro($correo);
        return $Data;
    }

    public function EliminarMaestro($DNI)
    {
        $this->maestro->EliminarMaestro($DNI);
    }

    public function LeerMaestroLogin($id)
    {
        $LeerMaestro = new maestros_models($this->con);
        $Data = $LeerMaestro->LeerMaestroLogin($id);
        return $Data;
    }
}
?>