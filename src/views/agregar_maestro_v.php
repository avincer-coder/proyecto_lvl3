<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
require_once "../config/config_admin.php";
$html_roll;
switch($tipo_usuario){

    case "admin":
        $html_roll = "<p>Soy administrador</p>";
    break;
    
    case "alumno":
        header("location:../index.php");
    break;
    
    case "maestro":
        header("location:../index.php");
    break;

    default:
        header("location:../index.php");
    break;
};


require_once "../controllers/maestros_controller.php";
require_once "../config/config_alumno.php";

$maestros = new maestros_controller($con);
$AllMaestros =  $maestros->LeerUsuariosMaestros();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Crear Clase</title>
</head>
<body class="flex justify-center items-center	 h-screen bg-[#7f7f7f]"> 
    <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
        <form class="flex flex-col  w-[300px]" action="../acciones/crear_claseMaestro_l.php " method="post">

            <h1 class="text-2xl font-semibold mb-[20px]">Agregar Clase</h1>

            <label class="font-bold text-sm" for="clase">Clase</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="clase" id="clase" type="text">

            <label class="font-bold text-sm" for="maestro">Maestro</label>
            <select class="w-[300px] border-[1px] border-solid border-[#c0c5cb] rounded" name="maestro" id="maestro">
                        <?php foreach($AllMaestros as $maestro):?>
                        <option 
                            value="<?= $maestro["DNI"] ?>">
                            <?= $maestro["nombre"] ?>
                        </option>
                        <?php endforeach;?>
            </select>

            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/clases_v.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[50px] h-[30px] rounded text-xs" value="crear" type="submit">
            </div>
            <!-- <input type="submit"> -->
        </form>
    </main>
</body>
</html>