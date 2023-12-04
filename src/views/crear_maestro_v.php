<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
require_once "../controllers/materias_controller.php";
require_once "../config/config_admin.php";
$controller_materias = new materias_controller($con);
$LeerMaterias = $controller_materias->LeerMaterias();
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Crear Maestro</title>
</head>
<body class="flex justify-center items-center	 h-screen bg-[#7f7f7f]"> 
    <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
        <form class="flex flex-col  w-[300px]" action="../acciones/agregar_maestros_l.php " method="post">

            <h1 class="text-2xl font-semibold mb-[20px]">Agregar Maestro</h1>

            <label class="font-bold text-sm" for="DNI">DNI</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="DNI" id="DNI" type="number">

            <label class="font-bold text-sm" for="email">Correo Electronico</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="email" id="email" type="email">

            <label class="font-bold text-sm" for="nombre">Nombre(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="nombre" id="nombre" type="text">
            
            <label class="font-bold text-sm" for="apellido">Apellido(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="apellido" id="apellido" type="text">

            <label class="font-bold text-sm" for="direccion">Dirección</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="direccion" id="direccion" type="text">

            <label class="font-bold text-sm" for="fecha">Fecha de Nacimiento</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="fecha" id="fecha" type="date">

            <label class="font-bold text-sm" for="clase">Clase Asignada</label>
            <select class="w-[300px] border-[1px] border-solid border-[#c0c5cb] rounded" name="clase" id="clase">
                        <?php foreach($LeerMaterias as $materia):?>
                        <option 
                            value="<?= $materia["ID"] ?>">
                            <?= $materia["materia"] ?>
                        </option>
                        <?php endforeach;?>
            </select>




            <label class="font-bold text-sm" for="contraseña">Contraseña</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="" name="contraseña" id="contraseña" type="password">

            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/maestros_v.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[50px] h-[30px] rounded text-xs" value="crear" type="submit">
            </div>
            <!-- <input type="submit"> -->
        </form>
    </main>
</body>
</html>