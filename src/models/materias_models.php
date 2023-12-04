<?php 
    class materias_models{
        public $con;
        public function __construct(PDO $con)
        {
            $this->con = $con;
        }

        public function LeerMaterias()
        {
            $query = $this->con->prepare("SELECT * FROM materias;");
            $query->execute();
            $Data= $query->fetchAll();
            return $Data;
        }

        public function LeerMateriasMaestro()
        {
            $query = $this->con->prepare("SELECT * FROM maestros_clases_view;");
            $query->execute();
            $Data= $query->fetchAll();
            return $Data;
        }

        public function ContarAlumnosMaterias()
        {
            $query = $this->con->prepare("SELECT * FROM materia_maestros_alumnos_view;");
            $query->execute();
            $Data= $query->fetchAll();
            return $Data;
        }

        public function AgregarMateria($materia){
            $query = $this->con->prepare("INSERT INTO materias
            (materia)
            VALUES(?)");
            
            $query->execute(array($materia));
            $Last_id = $this->con->lastInsertId();
            return $Last_id;
        }
        
        public function AgregarClaseMaestro($DNI, $materia){
            $query = $this->con->prepare("INSERT INTO maestros_clases
            (DNI, materia)
            VALUES(?, ?)");
            
            $query->execute(array($DNI, $materia));
        }

        public function EditarClaseMaestro($materia, $DNI){
            $query = $this->con->prepare("UPDATE `maestros_clases` SET `materia` = ? WHERE `maestros_clases`.`DNI` = ?;");
            $query->execute(array($materia, $DNI));
            $Data = $query->rowCount();
            return $Data;
        }
        // UPDATE `maestros_clases` SET `DNI` = '43523234' WHERE `maestros_clases`.`id_maestroMateria` = 13;
        public function EditarClase($DNI, $IdMaestroMateria){
            $query = $this->con->prepare("UPDATE `maestros_clases` SET `DNI` = ? WHERE `maestros_clases`.`id_maestroMateria` = ?;");
            $query->execute(array($DNI, $IdMaestroMateria));
            $Data = $query->rowCount();
            return $Data;
        }

        public function BuscarMaestroMateria($DNI){
            $query = $this->con->prepare("SELECT * FROM maestros_clases where DNI = :DNI;");
            $query -> bindParam(":DNI",$DNI);
            $query->execute();
            
            $DataUsuarios = $query->fetchAll();
            return $DataUsuarios;
        }
    };
