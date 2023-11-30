<?php 
require_once "../controllers/maestros_controller.php";
require_once "../config/config_alumno.php";
$controller_maestro = new maestros_controller($con);
$correo = $_POST["input_correo"];
$Maestro = $controller_maestro->BuscarMaestro($correo);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Editar Maestro</title>
</head>
<body  class="flex justify-center items-center	 h-screen bg-[#7f7f7f]">
    <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
        <form class="flex flex-col  w-[300px]"  action="../acciones/editar_maestros_l.php " method="post">

            <h1 class="text-2xl font-semibold mb-[20px]">Editar Maestro</h1>

            <label class="font-bold text-sm" for="email">Correo Electronico</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Maestro[0]["email"]); ?>" name="email" id="email" type="email">

            <label class="font-bold text-sm" for="nombre">Nombre(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Maestro[0]["nombre"]); ?>" name="nombre" id="nombre" type="text">
            
            <label class="font-bold text-sm" for="apellido">Apellido(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="apellido" id="apellido" type="text">

            <label class="font-bold text-sm" for="direccion">Dirección</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Maestro[0]["direccion"]); ?>" name="direccion" id="direccion" type="text">

            <label class="font-bold text-sm" for="fecha">Fecha de Nacimiento</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Maestro[0]["fecha"]); ?>" name="fecha" id="fecha" type="date">

            <label class="font-bold text-sm" for="clase">Clase Asignada</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Maestro[0]["clase"]); ?>" name="clase" id="clase" type="text">

            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/maestros_v.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[150px] h-[30px] rounded text-xs" value="Guardar Cambios" type="submit">
            </div>
        </form>
    </main>
</body>
</html>