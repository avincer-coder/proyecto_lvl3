<?php
require_once "../models/maestros_models.php"; 


class maestros_controller{
    
    public $con;
        
    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function LeerMaestros(){
        $maestro = new maestros_models($this->con);
        $datos = $maestro->LeerMaestros();
        return $datos;
    }

    // public function EliminarAlumnos($correo){
    //     $EliminarUsuario = new alumnos_models($this->con);
    //     $EliminarUsuario->EliminarAlumnos($correo);
    // }
    
    public function AgregarMaestros($nombre,$email,$direccion, $fecha, $clase){
        $AgregarMaestro = new maestros_models($this->con);
        $AgregarMaestro->AgregarMaestro($nombre,$email,$direccion, $fecha, $clase);
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
}
?>