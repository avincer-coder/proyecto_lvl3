<?php
require_once "../models/clase_models.php"; 

class clase_controller{

    public function EliminarClase($ID)
    {
        $clase = new clase_models();
        $clase->EliminarClase($ID);
    }
}
?>