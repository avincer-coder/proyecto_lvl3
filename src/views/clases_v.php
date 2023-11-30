<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_alumno.php";
require_once "../menu/menu.php";

$alumnos_controler = new alumnos_controller($con);
$alumnos_view = $alumnos_controler->LeerClaseAlumnos();
$indice=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <title>Clases</title>
</head>
<body class="flex">
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

    <main class="ml-[20px]">
        <h1 class="text-2xl font-semibold">Lista de Clases</h1>
        <table class="pl-[10px] shadow-lg shadow-gray-950/50 ">
            <div class="flex justify-between items-center">
                <h2>Información de Clases</h2>
                <p><?php echo($editar_perfil)?></p>
                <a class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[110px] h-[30px] rounded text-xs flex items-center justify-center" href="">Agregar Clase</a>
            </div >
            <thead>
                <tr>
                    <td class="w-[50px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">#</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Nombre</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Calificacion</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Mensajes</td>
                    <td class="w-[280px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos_view as $dato_alumno):?>
                    <!-- Copiar y pegar tr y td para la tabla y crear variable indice en la logica en cero 0 -->
                    <tr class="<?= $indice % 2 === 0 ? 'bg-zinc-200 ' : 'bg-white' ?>">

                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?php $indice++; echo $indice; ?></td>

                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["nombre"] ?></td>
                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["calificacion"] ?></td>
                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["mensaje"] ?></td>
                        <td class="flex justify-center pl-[10px] border-[1px] border-solid border-[#c0c5cb]">
                            <form class="mr-[50px]" method="post" action="editar_alumnos_v.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_alumno["correo"] ?>" 
                                    type="hidden">
                                <button><i class="fa-solid fa-pen-to-square" style="color: #48f000;"></i></button>
                            </form>
                            <form method="post" action="../acciones/eliminar_clase.php">
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

        
</body>
</html>