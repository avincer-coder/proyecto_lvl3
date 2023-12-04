<?php 
    class clase_models{

        public $con;

        public function __construct()
        {
            $this->con = new PDO("mysql:host=localhost;dbname=proyecto_final","root","");
        }

        public function EliminarClase($ID)
        {

            // DELETE FROM alumnos_materias WHERE `alumnos_materias`.`id` = 10

            $query = $this->con->prepare("DELETE FROM maestros_clases
            WHERE id_maestroMateria=:ID;");
            $query -> bindParam(":ID",$ID);
            $query->execute();
            $Data = $query->rowCount();
            return $Data;
        }
    };
?>