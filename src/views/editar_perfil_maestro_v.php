<?php 
require_once "../controllers/usuarios_controler.php";
require_once "../config/config_admin.php";
$copia_clase = new usuarios_controller($con);

session_start();
$correoDos = $_SESSION["correo"];

$buscar_usuario = $copia_clase->BuscarUsuario($correoDos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Perfil Maestro</title>
</head>
<body class="flex justify-center items-center	 h-screen bg-[#7f7f7f]">
   <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
    <form class="flex flex-col  w-[300px]"   action="../acciones/editar_perfil_maestro_l.php" method="post">

        <h1 class="text-2xl font-semibold mb-[20px]">Editar Perfil Maestro</h1>

            <label class="font-bold text-sm" for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $buscar_usuario[0]["correo"] ?>" readonly><br>

            <label class="font-bold text-sm" for="contrasena">Contraseña:</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" type="password" id="contrasena" name="contrasena" value="<?php echo $buscar_usuario[0]["password"] ?>"><br>

            <label class="font-bold text-sm" for="nombre">Nombre:</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" type="text" id="nombre" name="nombre" value="<?php echo $buscar_usuario[0]["nombre"] ?>"><br>

            <label class="font-bold text-sm" for="apellido">Apellido:</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" type="text" id="apellido" name="apellido" value="<?php echo $buscar_usuario[0]["apellido"] ?>"><br>

            <label class="font-bold text-sm" for="direccion"> Dirección:</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" type = "text" id = "direccion" name = "direccion" value = "<?php echo $buscar_usuario[0]["direccion"] ?>"><br>

            <label class="font-bold text-sm" for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $buscar_usuario[0]["fecha_nacimiento"] ?>"><br>

            <!-- <input type="submit" value="Editar"> -->
            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/dashboard.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[150px] h-[30px] rounded text-xs" value="Guardar Cambios" type="submit">
            </div>

        </form>
   </main>
</body>
</html>