<?php 
// Links de views y navegadores
$link_permisos = 
"
<div class='pb-[20px]'>
    <i class='fa-solid fa-user-lock' style='color: #b8c4d4;'></i>
    <a class='ml-[10px]' href='permisos_v.php'>Permisos</a>
</div>
";

$link_maestros = 
"
<div class='pb-[20px]'>
    <i class='fa-solid fa-chalkboard-user' style='color: #b8c4d4;'></i>
    <a class='ml-[10px]' href='maestros_v.php'>Maestros</a>
</div>
";

$link_alumnos = 
"
<div class='pb-[20px]'>
    <i class='fa-solid fa-graduation-cap fa-flip-horizontal' style='color: #b8c4d4;'></i>
    <a class='ml-[10px]' href='index_alumno.php'>Alumnos</a>
</div>
";

$link_admin = "<a href='index_admin.php'>Administrador</a>";
$link_clases = 
"
<div class='pb-[20px]'>
    <i class='fa-solid fa-chalkboard' style='color: #b8c4d4;'></i>
    <a class='ml-[10px]' href='clases_v.php'>Clases</a>
</div>

";
$link_clases_maestro = "<a href='clases_v.php'>Alumnos</a>";
$link_ver_calificaiones = "<a href='ver_calificaciones.php'>Ver Calificaciones</a>";
$link_administra_clases = "<a href='administra_clases_v.php'>Administra tus clases</a>";
$editar_perfil;
$menu;
$titulo_menu;
$menu_administracion;

$html_roll;
switch($tipo_usuario){

    case "admin":
        $titulo_menu = "Administrador";
        $html_roll = "<p>admin</p>";
        $menu = $link_permisos . $link_maestros . $link_alumnos . $link_clases;
        $editar_perfil = "";
        $menu_administracion="MENU ADMINISTRACIÓN";
    break;
    
    case "alumno":
        $titulo_menu = "ALUMNO";
        $html_roll = "<p>Soy Alumno</p>";
        $menu = $link_ver_calificaiones . $link_administra_clases;
        $editar_perfil = "<a href='editar_perfil_alumno.php'>Perfil</a>";
        $menu_administracion="";
    break;
    
    case "maestro":
        $titulo_menu = "MAESTRO";
        $html_roll = "<p>Soy maestro</p>";
        $menu = $link_clases_maestro;
        $editar_perfil = "<a href='editar_perfil_maestro_v.php'>Perfil</a>";
        $menu_administracion="";
    break;

    default:
    header("location:../index.php");
    break;
};
?>
