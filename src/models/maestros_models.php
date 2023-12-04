<?php 
    class maestros_models{
        public $con;
        public function __construct(PDO $con)
        {
            $this->con = $con;
        }

        public function LeerUsuariosMaestros()
        {
            $query = $this->con->prepare("SELECT * FROM `usuarios` WHERE `roll` = 'maestro' ORDER BY `password` ASC");
            $query->execute();
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }

        public function LeerMaestros()
        {
            $query = $this->con->prepare("SELECT * FROM  maestros_clases_view;");
            $query->execute();
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }

        //Segunda tabla de leer para poder eliminar
        public function LeerMaestrosEliminar()
        {
            $query = $this->con->prepare("SELECT * FROM  maestros_clases;");
            $query->execute();
            $DataEliminar = $query->fetchAll();

            return $DataEliminar;
        }

        // public function EliminarAlumnos($correo){
        //     $query = $this->con->prepare("DELETE FROM alumnos
        //     WHERE correo=:correo;");
        //     $query -> bindParam(":correo",$correo);
        //     $query->execute();
        //     $DataAlumnos = $query->rowCount();
        //     return $DataAlumnos;
        // }
        
        public function AgregarMaestro($DNI, $nombre,$email,$direccion, $fecha, $password, $apellido){
            $roll= 'maestro';
            $query = $this->con->prepare("INSERT INTO usuarios
            (DNI, nombre, correo, direccion, fecha_nacimiento, roll, password, apellido)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute(array($DNI, $nombre,$email,$direccion, $fecha, $roll, $password, $apellido));
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
            $query = $this->con->prepare("SELECT * FROM maestros_clases_view
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $DataAlumnos = $query->fetchAll();
            return $DataAlumnos;
        }

        public function EliminarMaestro($DNI)
        {
            $query = $this->con->prepare("DELETE FROM usuarios
            WHERE DNI=:DNI;");
            $query -> bindParam(":DNI",$DNI);
            $query->execute();
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }

        public function LeerMaestroLogin($id){
            $query = $this->con->prepare("SELECT * FROM tabla_alumnos_logmaestro where id_materia = :id;");
            $query -> bindParam(":id",$id);
            $query->execute();
            
            $Data = $query->fetchAll();
            return $Data;
        }

        
    };









?>