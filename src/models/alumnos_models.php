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

        public function EliminarAlumnos($correo){
            $query = $this->con->prepare("DELETE FROM alumnos
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }
    };









?>