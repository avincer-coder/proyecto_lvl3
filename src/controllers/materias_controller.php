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

    public function ContarAlumnosMaterias()
    {
        $datos = $this->materia->ContarAlumnosMaterias();
        return $datos;
    }

    public function LeerMaterias()
    {
        $datos = $this->materia->LeerMaterias();
        return $datos;
    }
    
    public function LeerMateriasMaestro()
    {
        $datos = $this->materia->LeerMateriasMaestro();
        return $datos;
    }

    public function AgregarClaseMaestro($DNI, $materia)
    {
        $this->materia->AgregarClaseMaestro($DNI, $materia);
    }

    public function AgregarMateria($materia)
    {
        $LastId = $this->materia->AgregarMateria($materia);
        return $LastId;
    }

    public function EditarClaseMaestro($materia, $DNI)
    {
        $actualiazr_alumno = $this->materia->EditarClaseMaestro($materia, $DNI);
        echo($actualiazr_alumno);
    }

    public function EditarClase($DNI, $IdMaestroMateria)
    {
        $Data = $this->materia->EditarClase($DNI, $IdMaestroMateria);
        echo($Data);
    }

    public function BuscarMaestroMateria($DNI)
    {
        $Data = $this->materia->BuscarMaestroMateria($DNI);
        return $Data;
    }

}
?>