<?php 
    class maestros_models{
        public $con;
        public function __construct(PDO $con)
        {
            $this->con = $con;
        }

        public function LeerMaestros()
        {
            $query = $this->con->prepare("SELECT * FROM maestros;");
            $query->execute();
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }

        // public function EliminarAlumnos($correo){
        //     $query = $this->con->prepare("DELETE FROM alumnos
        //     WHERE correo=:correo;");
        //     $query -> bindParam(":correo",$correo);
        //     $query->execute();
        //     $DataAlumnos = $query->rowCount();
        //     return $DataAlumnos;
        // }
        
        public function AgregarMaestro($nombre,$email,$direccion, $fecha, $clase){
            $query = $this->con->prepare("INSERT INTO maestros
            (nombre, email, direccion, fecha, clase)
            VALUES(?, ?, ?, ?, ?)");
            
            $query->execute(array($nombre,$email,$direccion, $fecha, $clase));
        }

        public function EditarMaestros($nombre,$email,$direccion, $fecha, $clase){
            $query = $this->con->prepare("UPDATE maestros
            SET nombre=?, direccion=?, fecha=?, clase=? 
            WHERE email=?");
            $query->execute(array($nombre,$direccion, $fecha, $clase, $email));
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }

        public function BuscarMaestro($correo)
        {
            $query = $this->con->prepare("SELECT * FROM maestros
            WHERE email=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $DataAlumnos = $query->fetchAll();
            return $DataAlumnos;
        }
    };









?>