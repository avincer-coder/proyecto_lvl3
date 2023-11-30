<?php 
// Pulir el nombre 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

// if ($tipo_usuario == "admin") {
//     echo("Bienvenido comprobado que eres admin");
// }else if($tipo_usuario  == "alumno"){
//     header("location:index_alumno.php");
// }else if($tipo_usuario == "maestro"){
//     header("location:index_maestro.php");
// }else{
//     echo("Tu tipo de usuario no esta definido");
// }

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
require_once "../menu/menu.php";
$maestros_controller = new maestros_controller($con);
$datos_maestros = $maestros_controller->LeerMaestros();
$indice=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <title>Maestros Read</title>
</head>
<body class="flex">
    <!-- <a href="../acciones/cerrar_session.php">Cerrar Sesion</a> -->
        
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
            <h1 class="text-2xl font-semibold">Lista de Maestros</h1>  
        <table class="pl-[10px] shadow-lg shadow-gray-950/50 ">
            <div class="flex justify-between items-center">
                <h2>Informacion de Maestros</h2>
                <a class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[110px] h-[30px] rounded text-xs flex items-center justify-center" href="crear_maestro_v.php">Agregar Maestro</a>
            </div >
            <thead>
                <tr>
                    <!-- <td>#</td> -->
                    <td class="w-[100px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">#</td>
                    <td class="w-[230px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Nombre</td>
                    <td class="w-[200px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Email</td>
                    <td class="w-[200px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Direccion</td>
                    <td class="w-[200px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Fec. de Nacimiento</td>
                    <td class="w-[200px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Clase Asignada</td>
                    <td class="w-[150px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos_maestros as $dato_maestro):?>
                    <!-- Copiar y pegar tr y td para la tabla y crear variable indice en la logica en cero 0 -->
                    <tr class=" <?= $indice % 2 === 0 ? 'bg-zinc-200 ' : 'bg-white' ?>">

                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?php $indice++; echo $indice; ?></td>

                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_maestro["nombre"] ?></td>
                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_maestro["email"] ?></td>
                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_maestro["direccion"] ?></td>
                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_maestro["fecha"] ?></td>
                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_maestro["clase"] ?></td>
                        <td class="pl-[10px] border-[1px] border-solid border-[#c0c5cb] flex justify-center">
                            <form method="post" action="editar_maestros_v.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_maestro["email"] ?>" 
                                    type="hidden">
                                <button><i class="fa-solid fa-pen-to-square" style="color: #48f000;"></i></button>
                            </form>
                

                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </main>
</body>
</html>