<?php
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];


//Bloquear esta pagina 
require_once "../menu/menu.php";
require_once "../controllers/alumnos_controller.php";
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";
$controller_alumno = new alumnos_controller($con);
$controller_materias = new materias_controller($con);
$LeerMaterias = $controller_materias->LeerMaterias();
$Materias = $controller_alumno->BuscarMaterias($correo);
$data_alumno = $controller_alumno->BuscarAlumno($correo);
// Aqui si no hay materias produce error
$indice_materia = 0;
$id_alumno = $data_alumno[0]["DNI"];

// if(count($Materias)==0){
//     $id_alumno=0;
// }else{
//     $id_alumno = $Materias[0]["id_alumno"];
// };

// 1 o mayor a 1 es igual a que ya esta
$MateriasFaltantes = array();

for ($y=0; $y < count($LeerMaterias); $y++) { 

    $MateriaActual = $LeerMaterias[$y]['materia'];
    $Encontrada = false;

    for ($i=0; $i < count($Materias); $i++) { 
        
            if($MateriaActual == $Materias[$i]['nombre_materia']){
                $Encontrada = True;
                break;
            }
    }   

    if(!$Encontrada){

            $MateriasFaltantes[]=array(
                'id'=>$LeerMaterias[$y]['ID'],
                'materia'=>$MateriaActual
            );

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
</head>
<body class="">


    <header>
        <?php echo($editar_perfil) ?>
    </header>
    <aside>
        <div>Logo</div>
        <div><?php echo($html_roll) ?></div>
        <div><?php echo($nombre) ?></div>
        <nav>
            <h1>MENU <?php echo($titulo_menu)  ?></h1>
            <?php echo($menu) ?>
        </nav>
        <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </aside>






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
                    
<tr class="<?= $indice_materia % 2 === 0 ? 'bg-sky-500 ' : 'bg-white' ?>">

                    


                        <td><?php $indice_materia++; echo $indice_materia; ?></td>
                        <td><?= $dato_alumno["nombre_materia"] ?></td>
                        <td>
                            <form action="../acciones/eliminar_materia_l.php" method="post">
                                <input name="id_materia" 
                                value="<?= $dato_alumno["am_id"] ?>" type="hidden">
                                <button>
                                    <i class="fa-solid fa-file-circle-minus" style="color: #ff0000;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>









        <section>

            <?php 
                if(count($MateriasFaltantes)==0){?>
                    <p>Ya estas inscrito a todas las clases</p>    
                <?php }else{ ?>
                    


                    <form action="../acciones/agregar_clase_l.php" method="post">
                        <select size="<?php echo(count($MateriasFaltantes))?>" name="clases" id="">
                        <?php foreach($MateriasFaltantes as $materia):?>
                        <option 
                            value="<?= $materia["id"] ?>">
                            <?= $materia["materia"] ?>
                        </option>
                        <?php endforeach;?>
                        </select>
                        <input type="hidden" value="<?php echo($id_alumno) ?>" name="id_alumno">
                        <input value="Inscribirse" type="submit">
                    </form>












            <?php    }
            ?>        

            
        </section>
</body>
</html>