<?php 
    class alumnos_models{
        public $con;
        public function __construct(PDO $con)
        {
            $this->con = $con;
        }

        public function LeerAlumnos()
        {
            $query = $this->con->prepare("SELECT * FROM alumnos;");
            $query->execute();
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }
        
        public function LeerClaseAlumnos()
        {
            $query = $this->con->prepare("SELECT * FROM clase_guarani_view;");
            $query->execute();
            $Data = $query->fetchAll();
            return $Data;
        }

        public function EliminarAlumnos($correo){
            $query = $this->con->prepare("DELETE FROM alumnos
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }
        
        public function AgregarAlumnoso($dni,$nombre, $apellido,$correo,$direccion,$fecha){
            $query = $this->con->prepare("INSERT INTO alumnos
            (DNI, nombre, apellido, correo, direccion, fecha)
            VALUES(?, ?, ?, ?, ?, ?)");
            
            $query->execute(array($dni,$nombre, $apellido,$correo,$direccion,$fecha));
        }

        public function EditarAlumnos($dni,$nombre, $apellido,$correo,$direccion,$fecha){
            $query = $this->con->prepare("UPDATE alumnos
            SET DNI=?, nombre=?, apellido=?, direccion=?, fecha=? 
            WHERE correo=?");

            $query->execute(array($dni,$nombre,$apellido,$direccion,$fecha,$correo));
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }

        public function BuscarAlumno($correo)
        {
            $query = $this->con->prepare("SELECT * FROM alumnos
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $DataAlumnos = $query->fetchAll();
            return $DataAlumnos;
        }

        public function AlumnoClases($correo){
            $query = $this->con->prepare("SELECT * FROM alumnos_materia_view
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $Data = $query->fetchAll();
            return $Data;
        }

        public function EliminarMateria($id){
            $query = $this->con->prepare("DELETE FROM alumno_materias
            WHERE id=:id;");
            $query -> bindParam(":id",$id);
            $query->execute();
            $Data = $query->rowCount();
            return $Data;
        }

        public function AgregarClaseAlumno($alumno, $materia){
            $query = $this->con->prepare("INSERT INTO alumno_materias
            (alumno, materia)
            VALUES(?, ?)");
            
            $query->execute(array($alumno, $materia));
        }
        
        // public function BuscarAlumnoClase();
    };









?>