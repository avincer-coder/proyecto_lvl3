<?php
require_once "../models/alumnos_models.php"; 


class alumnos_controller{
    
    public $con;
    public $alumno;

    public function __construct(PDO $con)
    {
        $this->con = $con;
        $alumno = new alumnos_models($this->con);
        $this->alumno = $alumno;
    }


    public function LeerAlumnos()
    {
        $datos = $this->alumno->LeerAlumnos();
        return $datos;
    }
    
    public function LeerClaseAlumnos()
    {
        $datos = $this->alumno->LeerClaseAlumnos();
        return $datos;
    }

    public function EliminarAlumnos($correo)
    {
        $this->alumno->EliminarAlumnos($correo);
    }
    
    public function AgregarAlumno($DNI, $nombre,$email,$direccion, $fecha,  $password, $apellido){
        $this->alumno->AgregarAlumno($DNI, $nombre,$email,$direccion, $fecha, $password, $apellido);
    }
    
    public function EditarAlumnos($dni,$nombre, $apellido, $correo,$direccion,$fecha)
    {
        $actualiazr_alumno = $this->alumno->EditarAlumnos($dni,$nombre, $apellido, $correo,$direccion,$fecha);
        echo($actualiazr_alumno);
        echo($correo);
    }

    public function BuscarAlumno($correo)
    {
        $Data = $this->alumno->BuscarAlumno($correo);
        return $Data;
    }

    public function BuscarMaterias($correo)
    {
        $Data = $this->alumno->AlumnoClases($correo);
        return $Data;
    }

    public function EliminarMateria($id)
    {
        $this->alumno->EliminarMateria($id);
    }

    public function AgregarClaseAlumno($alumno, $materia)
    {
        $this->alumno->AgregarClaseAlumno($alumno, $materia);
    }

}
?>