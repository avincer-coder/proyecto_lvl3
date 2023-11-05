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
        
        public function AgregarAlumnoso($dni,$nombre, $apellido,$correo,$direccion,$fecha){
            $query = $this->con->prepare("INSERT INTO alumnos
            (DNI, nombre, apellido, correo, direccion, fecha)
            VALUES(?, ?, ?, ?, ?, ?)");
            
            $query->execute(array($dni,$nombre, $apellido,$correo,$direccion,$fecha));
            // $DataAlumnos = $query->rowCount();
            // return $DataAlumnos;
        
        }
        public function EditarAlumnos($dni,$nombre, $apellido,$correo,$direccion,$fecha){
            $query = $this->con->prepare("UPDATE alumnos
            SET DNI=?, nombre=?, apellido=?, direccion=?, fecha=? 
            WHERE correo=?");

            $query->execute(array($dni,$nombre,$apellido,$direccion,$fecha,$correo));
            $email = "b@b";
            // $query = $this->con->prepare("UPDATE proyecto_final.alumnos
            // SET DNI=703070, nombre='bbbb', direccion='bbb', fecha='2023-11-11', apellido='bbb'
            // WHERE correo=?");
            // echo($correo);

            
            // $query->execute(array($correo));
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }
    };









?>