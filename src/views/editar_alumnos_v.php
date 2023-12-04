<?php 
require_once "../controllers/usuarios_controler.php";
require_once "../config/config_alumno.php";
$controller_usuarios = new usuarios_controller($con);
$correo = $_POST["input_correo"];
$Alumno = $controller_usuarios->BuscarUsuario($correo);
// Correguir el DNI para poder editarlo sin que causeconflictos conla logica
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Editar Alumno</title>
</head>
<body class="flex justify-center items-center	 h-screen bg-[#7f7f7f]">
    <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
        <form class="flex flex-col  w-[300px]" action="../acciones/editar_alumnos_l.php" method="post">

            <h1 class="text-2xl font-semibold mb-[20px]">Editar Alumno</h1>

            <label class="font-bold text-sm" for="dni">DNI</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["DNI"]); ?>" name="DNI" id="dni" type="number" readonly>

            <label class="font-bold text-sm" for="correo">Correo Electronico</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["correo"]); ?>" name="correo" id="correo" type="email" readonly>
            
            <label class="font-bold text-sm" for="nombre">Nombre(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["nombre"]); ?>" name="nombre" id="nombre" type="text">

            <label class="font-bold text-sm" for="apellido">Apellido(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["apellido"]); ?>" name="apellido" type="text">

            <label class="font-bold text-sm" for="direccion">Direccion</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["direccion"]); ?>" name="direccion" id="direccion" type="text">

            <label class="font-bold text-sm" for="fecha">Fecha de nacimiento</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["fecha_nacimiento"]); ?>" name="fecha" id="fecha" type="date">
            
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" value="<?php echo($Alumno[0]["password"]); ?>" name="contraseña"  type="hidden">
            <!-- <input type="submit"> -->

            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/index_admin.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[150px] h-[30px] rounded text-xs" value="Guardar Cambios" type="submit">
            </div>
        </form>
    </main>
</body>
</html>