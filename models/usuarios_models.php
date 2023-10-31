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
        
        public function EditarUsuarios(){}
        
        public function EliminarUsuarios(){}



    };
?>