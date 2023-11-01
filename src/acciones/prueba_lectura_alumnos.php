<?php 
require_once "../controllers/alumnos_controller.php";


require_once "../config/config_alumno.php";




$alumnos_controller = new alumnos_controller($con);
$datos_alumnos = $alumnos_controller->LeerAlumnos();

// foreach($datos_alumnos as $dato_alumno){
//     echo($dato_alumno["DNI"]);
// };
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

                        <form method="post" action="eliminar_alumnos.php">
                            <input 
                                name="input_correo"
                                value="<?=$dato_alumno["correo"] ?>" 
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