<?php 
if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $error;
    require_once "../controllers/usuarios_controler.php";
    $usuario_prueba = new usuarios_controller();
    $data_usuario = $usuario_prueba->ComprobarUsuario($correo);

    if ($data_usuario) {
        $validacionContraseña = $usuario_prueba->ValidarContraseña($correo, $password);
        if ($validacionContraseña) {
            $roll = $usuario_prueba->ObtenerRoll($correo, $password);
            $nombre = $usuario_prueba->ObtenerNombre($correo, $password);
            session_start();
            $_SESSION["nombre"] = $nombre;
            $_SESSION["tipo_usuario"] = $roll;
            $_SESSION["correo"] = $correo;
          
            header("location:../views/dashboard.php");



        }else{
            $error="Contraseña Incorrecta";
        }


    }else{
        $error="Tu correo es invalido";
    }


}else{
    $error="Hubo un error con los campos correo y password revisalos eh intentalo nuevamente";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#fff5d2] h-screen flex flex-col items-center justify-center">
    <main class="px-[25px] py-[10px] rounded-lg bg-white flex flex-col items-center justify-center shadow-lg shadow-gray-950/50">
        <p class="pb-[10px]">"¡Ups!"</p>
        <p class="font-semibold">-<?php echo($error) ?>-</p>
        <a class="hover:bg-[#0062cc] mt-[20px] cursor-pointer my-[10px] bg-[#007aff] text-white w-[100px] h-[30px] rounded text-xs flex flex-col items-center justify-center" href="../index.php">Regresar</a>
    </main>
</body>
</html>