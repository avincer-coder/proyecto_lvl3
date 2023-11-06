<?php 
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_alumno.php";

$alumnos_controler = new alumnos_controller($con);
$alumnos_view = $alumnos_controler->LeerClaseAlumnos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Calificacion</td>
                    <td>Mensajes</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos_view as $dato_alumno):?>
                    <tr>
                        <td><?= $dato_alumno["nombre"] ?></td>
                        <td><?= $dato_alumno["calificacion"] ?></td>
                        <td><?= $dato_alumno["mensaje"] ?></td>
                        <td>
                            <form method="post" action="editar_clase_alumnos.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_alumno["nombre_alumno"] ?>" 
                                    type="hidden">
                                <input type="submit">
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</body>
</html>