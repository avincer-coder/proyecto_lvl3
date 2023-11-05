<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../acciones/editar_alumnos_l.php" method="post">
        <label for="dni">DNI</label>
        <input name="dni" id="dni" type="number">

        <label for="correo">Correo Electronico</label>
        <input name="correo" id="correo" type="email">
        
        <label for="nombre">Nombre(s)</label>
        <input name="nombre" id="nombre" type="text">

        <label for="apellido">Apellido(s)</label>
        <input name="apellido" type="text">

        <label for="direccion">Direccion</label>
        <input name="direccion" id="direccion" type="text">

        <label for="fecha">Fecha de nacimiento</label>
        <input name="fecha" id="fecha" type="date">
        <input type="submit">
    </form>
</body>
</html>