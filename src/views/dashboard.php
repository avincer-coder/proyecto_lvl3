<?php 
session_start();
$tipo_usuario = $_SESSION["tipo_usuario"];
// Links de views y navegadores

require_once "../menu/menu.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <title>Administrador</title>
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
    <main class="fle">
        <article class="pr-[5px] pl-[25px] shadow-lg shadow-gray-950/50 w-[85vw] flex justify-between h-[35px] mb-[30px]">
            <section class="flex items-center justify-center">
                <i class="fa-solid fa-grip-lines" style=" display: flex;color: #b8c4d4;align-items: center;"></i>
                <p class="text-[#b8c4d4] ml-[25px]">Home</p>
            </section>
            <p class="flex items-center justify-center my-[10px] hover:bg-[#404347] cursor-pointer bg-[#6c747f] text-white w-[100px] h-[30px] rounded text-xs mr-[10px]">-
                <?php echo($editar_perfil) ?>
                        -
                <i class="flex items-center fa-solid fa-chevron-down" style="  display: flex;color: #b8c4d4; align-items: center;"></i>
            </p>
            
        </article>
        <article class="pl-[10px]">
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <section class="shadow-lg shadow-gray-950/50 w-[700px] p-[15px] rounded">
                <h2>Bienvenido</h2>
                <p>Selecciona la accion que quieras realizar en las pestañas del menu de la izquierda.</p>
            </section>
        </article>
    </main>
</body>
</html>