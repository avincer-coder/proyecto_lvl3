<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];

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
    <title>Agregar Alumno</title>
</head>
<body class="flex justify-center items-center	 h-screen bg-[#7f7f7f]"> 
    <main class="bg-white shadow-lg shadow-gray-950/50 p-[20px] rounded">
        <form class="flex flex-col  w-[300px]" action="../acciones/agregar_alumnos_l.php " method="post">

            <h1 class="text-2xl font-semibold mb-[20px]">Agregar Alumno</h1>

            <label class="font-bold text-sm" for="dni">DNI</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]"  name="dni" id="dni" type="number" placeholder="Ingresa la matricula">

            <label class="font-bold text-sm" for="correo">Correo Electronico</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]" name="correo" id="correo" type="email" placeholder="Ingresa email">
            
            <label class="font-bold text-sm" for="nombre">Nombre(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]"  name="nombre" id="nombre" type="text"
            placeholder="Ingresa nombre(s)">

            <label class="font-bold text-sm" for="apellido">Apellido(s)</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]"  name="apellido" type="text" placeholder="Ingresa apellido(s)">

            <label class="font-bold text-sm" for="direccion">Direccion</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px] text-sm mb-[15px]"  name="direccion" id="direccion" type="text"
            placeholder="Ingresa la dirección">

            <label class="font-bold text-sm" for="fecha">Fecha de nacimiento</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px]"  name="fecha" id="fecha" type="date">
            
            <label class="font-bold text-sm" for="contraseña">Contraseña</label>
            <input class="border-[1px] border-solid border-[#c0c5cb] rounded pl-[5px]"  name="contraseña" id="contraseña" type="text">
            
            <div class="flex justify-end">
                <a class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[50px] h-[30px] rounded text-xs mr-[10px]" href="../views/index_alumno.php">Close</a>
                
                <input class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[50px] h-[30px] rounded text-xs" value="crear" type="submit">
            </div>
        </form>
    </main>
    
</body>
</html>