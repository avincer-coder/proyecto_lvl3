<?php 





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body class="bg-[#fff5d2] flex flex-col items-center">
    <img class="w-[300px]" src="img/logo.jpg"  alt="logo">
    <main class="px-[25px] border-2 border-solid shadow-lg shadow-gray-950/50 p-4 bg-white flex flex-col items-center rounded">
        <p class="mb-[15px] mt-[5px]">Bienvenido ingresa con tu cuenta</p>
        <form class="flex flex-col items-end" action="./acciones/validacion_login.php" method="post">

            <section class="border-2 border-solid h-[40px] w-[300px] flex items-center rounded-lg mb-[10px]">
                <input class="bg-inherit w-full h-full pl-[10px] focus:outline-none" id="correo" placeholder="Email" name="correo" type="text">
                <label for="correo" class="cursor-pointer h-full flex items-center pr-[5px]"> 
                    <i class="fa-solid fa-envelope" style="color: #949494;"></i>
                </label>
            </section>

            <section class="border-2 border-solid h-[40px] w-[300px] flex items-center rounded-lg">
                <input class="bg-inherit w-full h-full pl-[10px] focus:outline-none" id="password" placeholder="Password" name="password" type="password">
                <label class="cursor-pointer h-full flex items-center pr-[5px]" for="password">
                    <i class="fa-solid fa-lock" style="color: #949494;"></i>
                </label>
            </section>
            <input value="Ingresar" class="hover:bg-[#0062cc] cursor-pointer my-[10px] bg-[#007aff] text-white w-[90px] h-[30px] rounded text-xs" type="submit">
        </form>
    </main>

    <article class="mt-[40px] mb-[20px] px-[15px] shadow-md shadow-gray-950/50 p-4 bg-white rounded">
        <p class="border-solid border-b-2 pb-[5px] mb-[17px]">Información Acceso</p>
        <section class="flex flex-col justify-between h-[260px] ">
            <h1>Admin</h1>
            <p class="text-sm">user: admin@admin</p>
            <p class="text-sm">pass: admin</p>
            <h1>Maestros</h1>
            <p class="text-sm">user: maestro@maestro</p>
            <p class="text-sm">pass: maestro</p>
            <h1>Alumno</h1>
            <p class="text-sm">user: alumno@alumno</p>
            <p class="text-sm mb-[15px]">pass: alumno</p>
        </section>
    </article>
</body>
</html>