<?php 
// Links de views y navegadores
$link_permisos = "<a href='permisos_v.php'>Permisos</a>";
$link_maestros = "<a href='maestros_v.php'>Maestros</a>";
$link_alumnos = "<a href='index_alumno.php'>Alumnos</a>";
$link_admin = "<a href='index_admin.php'>Asministrador</a>";
$link_clases = "<a href='clases_v.php'>Clases</a>";
$link_clases_maestro = "<a href='clases_v.php'>Alumnos</a>";
$link_ver_calificaiones = "<a href='ver_calificaciones.php'>Ver Calificaciones</a>";
$link_administra_clases = "<a href='administra_clases_v.php'>Administra tus clases</a>";
$editar_perfil;
$menu;
$titulo_menu;

$html_roll;
switch($tipo_usuario){

    case "admin":
        $titulo_menu = "ADMINISTRADOR";
        $html_roll = "<p>Soy administrador</p>";
        $menu = $link_permisos . $link_maestros . $link_alumnos . $link_clases;
        $editar_perfil = "";
    break;
    
    case "alumno":
        $titulo_menu = "ALUMNO";
        $html_roll = "<p>Soy Alumno</p>";
        $menu = $link_ver_calificaiones . $link_administra_clases;
        $editar_perfil = "<a href='editar_perfil_alumno.php'>Perfil</a>";
    break;
    
    case "maestro":
        $titulo_menu = "MAESTRO";
        $html_roll = "<p>Soy maestro</p>";
        $menu = $link_clases_maestro;
        $editar_perfil = "<a href='editar_perfil_maestro_v.php'>Perfil</a>";
    break;

    default:
    header("location:../index.php");
    break;
};
?>