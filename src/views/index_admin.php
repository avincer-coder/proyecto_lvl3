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
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_alumno.php";
$alumnos_controller = new alumnos_controller($con);
$datos_alumnos = $alumnos_controller->LeerAlumnos();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
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
            <a href="crear_alumno_v.php">Agregar Alumno</a>
        <table>
            <thead>
                <tr>
                    <td>DNI</td>
                    <td>Correo</td>
                    <td>Nombre</td>
                    <td>Direccion</td>
                    <td>Fecha</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos_alumnos as $dato_alumno):?>
                    <tr>
                        <td><?= $dato_alumno["DNI"] ?></td>
                        <td><?= $dato_alumno["correo"] ?></td>
                        <td><?= $dato_alumno["nombre"] ?></td>
                        <td><?= $dato_alumno["direccion"] ?></td>
                        <td><?= $dato_alumno["fecha"] ?></td>
                        <td>
                            <form method="post" action="editar_alumnos_v.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_alumno["correo"] ?>" 
                                    type="hidden">
                                <button><i class="fa-solid fa-pen-to-square" style="color: #48f000;"></i></button>
                            </form>
                            <form method="post" action="eliminar_alumnos.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_alumno["correo"] ?>" 
                                    type="hidden">
                                <button><i class="fa-solid fa-trash-can" style="color: #ff0a0a;"></i></button>
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