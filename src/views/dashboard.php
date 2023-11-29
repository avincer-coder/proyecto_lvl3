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
    <title>Document</title>
</head>
<body>
    <header>
        <?php echo($editar_perfil) ?>
    </header>
    <aside>
        <div>Logo</div>
        <div><?php echo($html_roll) ?></div>
        <nav>
            <h1>MENU <?php echo($titulo_menu)  ?></h1>
            <?php echo($menu) ?>
        </nav>
        <a href="../acciones/cerrar_session.php">Cerrar Sesion</a>
    </aside>
</body>
</html>