<?php 






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
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