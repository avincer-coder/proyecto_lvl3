<?php
session_start();
$correo = $_SESSION['correo'];
//Bloquear esta pagina 
$i = 0;
$id = 5;
// No agregar una materia que ya tiene el alumno
$alumno = 1;
$materia = 3;
$Acumulado = [];

require_once "../controllers/alumnos_controller.php";
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";
$controller_alumno = new alumnos_controller($con);
$controller_materias = new materias_controller($con);
$LeerMaterias = $controller_materias->LeerMaterias();
$Materias = $controller_alumno->BuscarMaterias($correo);

$id_alumno = $Materias[0]["id_alumno"];

// 1 o mayor a 1 es igual a que ya esta

for ($y=0; $y < count($LeerMaterias); $y++) { 
    array_push($Acumulado, $y);
        for ($i=0; $i < count($Materias); $i++) { 
        if($LeerMaterias[$y]['materia'] == $Materias[$i]['nombre_materia']){
            $Acumulado[$y]++;
            echo('Numero de vueltas');
        }
    }
}
// Biomedicina
// Ciencias basicas
// Geografia
// Idiomas


//El primer form lee todas las materias (4, y) y el segundo lee mis materias como alumno (1, i).
echo(count($Materias));
echo($Acumulado[0]);
echo($Acumulado[1]);
echo($Acumulado[2]);
echo($Acumulado[3]);


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
                    <td>#</td>
                    <td>Materia</td>
                    <td>Darse de baja</td>
                </tr>
            </thead>


            
            <tbody>
                <?php foreach($Materias as $dato_alumno):?>
                    <tr>

                        <td><?php $i++; echo $i; ?></td>
                        
                        <td><?= $dato_alumno["nombre_materia"] ?></td>
                        <td> ID <?= $dato_alumno["id_materia"] ?></td>
                        <td>
                            <form action="../acciones/eliminar_materia_l.php" method="post">
                                <input name="id_materia" 
                                value="<?= $dato_alumno["am_id"] ?>" type="hidden">
                                <button>icono</button>
                            </form>
                        </td>

                        <td>ICONO</td>
                        
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>



        <section>


                











            <form action="../acciones/agregar_clase_l.php" method="post">
                <select name="clases" id="">
                    

                        <?php 
                            for ($i=0; $i < count($LeerMaterias); $i++){
                                echo($Acumulado[$i]);
                                if($Acumulado[$i] == 0){?>
                                    <option 
                                    value="<?php echo($LeerMaterias[$i]["ID"])?>" >
                                    <?php echo($LeerMaterias[$i]["materia"]) ?></option>
                                    <?php }?>
                            <?php } ?>
                  
                </select>
                <input type="hidden" value="<?php echo($id_alumno) ?>" name="id_alumno">
                <input value="Inscribirse" type="submit">
            </form>

            
        </section>
</body>
</html>