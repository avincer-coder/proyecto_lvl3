<?php
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];


//Bloquear esta pagina 
require_once "../menu/menu.php";
require_once "../controllers/usuarios_controler.php";
require_once "../controllers/alumnos_controller.php";
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";
$usuariosController = new usuarios_controller($con);
$controller_alumno = new alumnos_controller($con);
$controller_materias = new materias_controller($con);
$LeerMateriasMaestro = $controller_materias->LeerMateriasMaestro();
$LeerMaterias = $controller_materias->LeerMaterias();
$Materias = $controller_alumno->BuscarMaterias($correo);
$data_alumno = $usuariosController->BuscarUsuario($correo);
// Aqui si no hay materias produce error

$indice_materia = 0;
$id_alumno = $data_alumno[0]['DNI'];

// if(count($Materias)==0){
//     $id_alumno=0;
// }else{
//     $id_alumno = $Materias[0]["id_alumno"];
// };

// 1 o mayor a 1 es igual a que ya esta
$MateriasFaltantes = array();

for ($y=0; $y < count($LeerMateriasMaestro); $y++) { 

    $MateriaActual = $LeerMateriasMaestro[$y]['materia'];
    $Encontrada = false;

    for ($i=0; $i < count($Materias); $i++) { 
        
            if($MateriaActual == $Materias[$i]['nombre_materia']){
                $Encontrada = True;
                break;
            }
    }   

    if(!$Encontrada){

            $MateriasFaltantes[]=array(
                'id'=>$LeerMateriasMaestro[$y]['materia_ID'],
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
<body class="flex">


    <!-- <header>
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
    </aside> -->

    <aside class="h-screen bg-[#353a40] text-[#b8c4d4] w-[220px] shadow-lg shadow-gray-950/50">
        <section class=" pl-[20px] py-[15px] flex border-b-[1px] border-solid border-[#b8c4d4]">
            <img class="shadow-lg shadow-gray-950/50 w-[40px] rounded-[50%]" src="../img/logo_dos.jpg" alt="logo">
            <h1 class="pl-[10px] text-base flex items-center">Universidad</h1>
        </section>
        <section class="p-[20px]">
            <h2 class="text-lg pb-[10px]"><?php echo($html_roll) ?></h2>
            <h2 class="text-xs"><?php echo($titulo_menu)?></h2>
        </section>
        <div class="mx-[10px] h-[2px] border-b-[1px] border-solid border-[#b8c4d4]"></div>
        <h1 class="text-xs mb-[20px] mt-[30px] w-[100%] flex justify-center"><?php echo($menu_administracion)?></h1>  
        <nav class="flex flex-col px-[20px]">
            <?php echo($menu) ?>
        </nav>
        <a class="flex justify-center" href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </aside>

    <main  class="ml-[20px]">
        <h1 class="text-2xl font-semibold">Esquema de Clases</h1>
        <table class="pl-[10px] shadow-lg shadow-gray-950/50 ">
            <thead>
                <tr>
                    <td class="w-[50px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">#</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Materia</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Darse de baja</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Materias as $dato_alumno):?>
                    
                        <tr class="<?= $indice_materia % 2 === 0 ? 'bg-zinc-200 ' : 'bg-white' ?>">
                        <td class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?php $indice_materia++; echo $indice_materia; ?></td>
                        <td class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["nombre_materia"] ?></td>
                        <td class="flex justify-center pl-[10px] border-[1px] border-solid border-[#c0c5cb]">

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
    </main>





        <section class="border-[1px] border-solid border-[#c0c5cb] rounded ml-[100px] mt-[50px] flex flex-col items-center justify-center shadow-lg shadow-gray-950/50 h-[50vh]  w-[500px] rounded">
            <h1 class="text-2xl font-semibold">Materias para inscribir</h1>
            <p class=" pl-[10px] font-bold text-sm">Seleciona una clase y presiona inscribir</p>
            <?php 
                if(count($MateriasFaltantes)==0){?>
                    <p>Ya estas inscrito a todas las clases</p>    
                <?php }else{ ?>
                    <form class="w-[300px]" action="../acciones/agregar_clase_l.php" method="post">
                        <select class="w-[300px] border-[1px] border-solid border-[#c0c5cb] rounded" size="4" name="clases" id="">
                        <?php foreach($MateriasFaltantes as $materia):?>
                        <option 
                            value="<?= $materia["id"] ?>">
                            <?= $materia["materia"] ?>
                        </option>
                        <?php endforeach;?>
                        </select>
                        <input   type="hidden" value="<?php echo($id_alumno) ?>" name="id_alumno">
                        <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[150px] h-[30px] rounded text-xs" value="Inscribirse" type="submit">
                    </form>
            <?php    }
            ?>        

            
        </section>
</body>
</html>