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
        <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </aside>

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
                                <button><i class="fa-solid fa-pen-to-square" style="color: #48f000;"></i></button>
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