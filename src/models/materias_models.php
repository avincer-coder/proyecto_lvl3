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
        
    };
