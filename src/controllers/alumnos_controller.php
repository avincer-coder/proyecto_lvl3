<?php
require_once "../models/alumnos_models.php"; 


class alumnos_controller{
    
    public $con;
        

    public function __construct(PDO $con)
    {



        $this->con = $con;


    }


    public function LeerAlumnos(){
        $alumno = new alumnos_models($this->con);
        $datos = $alumno->LeerAlumnos();
        return $datos;
    }

    public function EliminarAlumnos($correo){
        $EliminarUsuario = new alumnos_models($this->con);
        $EliminarUsuario->EliminarAlumnos($correo);
    }
}
?>