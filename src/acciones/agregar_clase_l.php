<?php 

if (isset($_POST['clases'])) {
    // Revisar errores de cero 0
    $clase = $_POST['clases'];
    $id_alumno = $_POST['id_alumno'];
    echo($clase);
    echo($id_alumno);
    require_once "../controllers/alumnos_controller.php";
    require_once "../config/config_admin.php";
    $controller_alumno = new alumnos_controller($con);
    $controller_alumno->AgregarClaseAlumno($id_alumno, $clase); 
    header('location:../views/administra_clases_v.php');
} else {
    header('location:../views/administra_clases_v.php');
}



?>