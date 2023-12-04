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
require_once "../controllers/alumnos_controller.php";
require_once "../config/config_admin.php";
require_once "../menu/menu.php";
$alumnos_controller = new alumnos_controller($con);
$datos_alumnos = $alumnos_controller->LeerAlumnos();
$indice=0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <title>Index</title>
</head>
<body class="flex">
    <!-- <a href="../acciones/cerrar_session.php">Cerrar Sesion</a> -->

        <!-- <header>
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
        </header> -->
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
            <h1 class="text-2xl font-semibold">Lista de Alumnos</h1>
        <table class="pl-[10px] shadow-lg shadow-gray-950/50 ">
            <div class="flex justify-between items-center">
                <h2>Información de Maestros</h2>
                <a class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[110px] h-[30px] rounded text-xs flex items-center justify-center" href="crear_alumno_v.php">Agregar Alumno</a>
            </div >
            <thead>
                <tr>
                    <td class="w-[50px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">#</td>
                    <td class="w-[230px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">DNI</td>
                    <td class="w-[150px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Nombre</td>
                    <td class="w-[150px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Correo</td>
                    <td class="w-[250px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Direccion</td>
                    <td class="w-[200px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Fecha</td>
                    <td class="w-[250px] pl-[10px] font-bold text-sm border-[1px] border-solid border-[#c0c5cb]">Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos_alumnos as $dato_alumno):?>
                    <!-- Copiar y pegar tr y td para la tabla y crear variable indice en la logica en cero 0 -->
                <tr class="<?= $indice % 2 === 0 ? 'bg-zinc-200 ' : 'bg-white' ?>">

                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?php $indice++; echo $indice; ?></td>
                        
                        <td  class=" pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["DNI"] ?></td>
                        <td  class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["nombre"] ?></td>
                        <td  class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["correo"] ?></td>
                        <td  class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["direccion"] ?></td>
                        <td  class="pl-[10px] border-[1px] border-solid border-[#c0c5cb]"><?= $dato_alumno["fecha_nacimiento"] ?></td>
                        <td  class="flex justify-center pl-[10px] border-[1px] border-solid border-[#c0c5cb]">
                            <form class="mr-[50px]" method="post" action="editar_alumnos_v.php">
                                <input 
                                    name="input_correo"
                                    value="<?=$dato_alumno["correo"] ?>" 
                                    type="hidden">
                                <button><i class="fa-solid fa-pen-to-square" style="color: #48f000;"></i></button>
                            </form>
                            <form method="post" action="../acciones/eliminar_alumnos.php">
                                <input 
                                    name="id_alumno"
                                    value="<?=$dato_alumno["DNI"] ?>" 
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