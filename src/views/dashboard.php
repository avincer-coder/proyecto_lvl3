<?php 
session_start();

$tipo_usuario = $_SESSION["tipo_usuario"];
// Links de views y navegadores
$link_permisos = "<a href='permisos_v.php'>Permisos</a>";
$link_maestros = "<a href='maestros_v.php'>Maestros</a>";
$link_alumnos = "<a href='index_alumno.php'>Alumnos</a>";
$link_admin = "<a href='index_admin.php'>Asministrador</a>";
$link_clases = "<a href='clases_v.php'>Clases</a>";
$editar_perfil;
$menu;

$html_roll;
switch($tipo_usuario){

    case "admin":
        $html_roll = "<p>Soy administrador</p>";
        $menu = $link_admin . $link_maestros . $link_alumnos . $link_clases;
        $editar_perfil = "<a href='editar_perfil_admin.php'>Perfil</a>";
    break;
    
    case "alumno":
        $html_roll = "<p>Soy alumno</p>";
        $menu = "";
        $editar_perfil = "<a href='editar_perfil_alumno.php'>Perfil</a>";
    break;
    
    case "maestro":
        $html_roll = "<p>Soy maestro</p>";
        $menu = $link_clases;
        $editar_perfil = "<a href='editar_perfil_maestro_v.php'>Perfil</a>";
    break;

    default:
    header("location:../index.php");
    break;
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php echo($editar_perfil) ?>
    </header>
    <aside>
        <div>Logo</div>
        <div><?php echo($html_roll) ?></div>
        <nav>
            <h1>Menu administracion</h1>
            <?php echo($menu) ?>
        </nav>
        <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </aside>
</body>
</html>