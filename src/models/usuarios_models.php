<?php 
    class usuarios_models{

        public $con;

        public function __construct()
        {
            $this->con = new PDO("mysql:host=localhost;dbname=proyecto_final","root","");
        }

        public function LeerUsuarios(){
            $query = $this->con->prepare("SELECT * FROM usuarios;");
            $query->execute();
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }

        public function LeerUnUsuario($correo){
            $query = $this->con->prepare("SELECT * FROM proyecto_final.usuarios where correo = :correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            
            $DataUsuarios = $query->rowCount();
            return $DataUsuarios;
        }
        
        public function LeerContraseña($correo){
            $query = $this->con->prepare("SELECT * FROM proyecto_final.usuarios where correo = :correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }

        public function CrearUsuarios(){}
        
        public function EditarUsuarios($DNI, $nombre,$password,$apellido,$direccion,$fecha_nacimiento){
            $query = $this->con->prepare("UPDATE `usuarios` SET `nombre` = ?, `password` = ?, `apellido` = ?, `direccion` = ?, `fecha_nacimiento` = ? WHERE `usuarios`.`DNI` = ?;");
            $query->execute(array($nombre, $password, $apellido, $direccion, $fecha_nacimiento, $DNI));
            $Data = $query->rowCount();
            return $Data;
        }

        public function BuscarUsuario($correo)
        {
            $query = $this->con->prepare("SELECT * FROM usuarios
            WHERE correo=:correo;");
            $query -> bindParam(":correo",$correo);
            $query->execute();
            $Data = $query->fetchAll();
            return $Data;
        }

        public function EliminarUsuario($DNI)
        {
            $query = $this->con->prepare("DELETE FROM usuarios
            WHERE DNI=:DNI;");
            $query -> bindParam(":DNI",$DNI);
            $query->execute();
            $DataAlumnos = $query->rowCount();
            return $DataAlumnos;
        }
    };
?>