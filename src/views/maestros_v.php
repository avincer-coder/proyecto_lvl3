<?php 
// Pulir el nombre 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

if ($tipo_usuario == "admin") {
    echo("Bienvenido comprobado que eres admin");
}else if($tipo_usuario  == "alumno"){
    header("location:index_alumno.php");
}else if($tipo_usuario == "maestro"){
    header("location:index_maestro.php");
}else{
    echo("Tu tipo de usuario no esta definido");
}

// Logica del navegador lateral
$html_roll;
switch($tipo_usuario){

    case "admin":
        $html_roll = "<p>Soy administrador</p>";
    break;
    
    case "alumno":
        $html_roll = "<p>Soy alumno</p>";
    break;
    
    case "maestro":
        $html_roll = "<p>Soy maestro</p>";
    break;

    default:
    header("location:../index.php");
    break;
};

// Logica tabla alumnos
require_once "../controllers/maestros_controller.php";
require_once "../config/config_alumno.php";
$maestros_controller = new maestros_controller($con);
$datos_maestros = $maestros_controller->LeerMaestros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body >
    <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>

    <div>
        <header>
                <div>Logo</div>
                <div><?php echo($html_roll) ?></div>
                <nav>
                    <h1>Menu administracion</h1>
                    <a href="">Permisos</a>
                    <a href="maestros_v.php">Maestros</a>
                    <a href="index_alumno.php">Alumnos</a>
                    <a href="">Clases</a>
                </nav>
                <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
        </header>
        <main>
            <a href="crear_maestro_v.php">Agregar Maestro</a>
        <table>
            <thead>
                <tr>
                    <!-- <td>#</td> -->
                    <td>Nombre</td>
                    <td>Email</td>
                    <td>Direccion</td>
                    <td>Fecha</td>
                    <td>Clase</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos_maestros as $dato_maestro):?>
                    <tr>
                        <td><?= $dato_maestro["nombre"] ?></td>
                        <td><?= $dato_maestro["email"] ?></td>
                        <td><?= $dato_maestro["direccion"] ?></td>
                        <td><?= $dato_maestro["fecha"] ?></td>
                        <td><?= $dato_maestro["clase"] ?></td>
                        <td>
                            <form method="post" action="editar_maestros_v.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_maestro["email"] ?>" 
                                    type="hidden">
                                <input type="submit">
                            </form>
                

                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </main>
    </div>
</body>
</html>