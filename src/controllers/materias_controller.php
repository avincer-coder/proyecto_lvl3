<?php
require_once "../models/materias_models.php"; 


class materias_controller{
    
    public $con;
    public $materia;

    public function __construct(PDO $con)
    {
        $this->con = $con;
        $materia = new materias_models($this->con);
        $this->materia = $materia;
    }

    public function LeerMaterias()
    {
        $datos = $this->materia->LeerMaterias();
        return $datos;
    }

}
?>