<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1 class="text-3xl font-bold underline bg-sky-500">
        Hello world!
    </h1>
    <form 
    action="./acciones/validacion_login.php" 
    method="post">
        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="text">
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
        <input type="submit">
    </form>
</body>
</html>