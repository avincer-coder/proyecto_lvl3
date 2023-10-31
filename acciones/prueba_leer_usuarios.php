<?php 
require_once "../controllers/usuarios_controler.php";
$correo = "admin@admn";
$usuario_prueba = new usuarios_controller();
$data_usuario = $usuario_prueba->ComprobarUsuario($correo);
echo($data_usuario);



// foreach($data_usuario as $cada_usuario){
//     echo($cada_usuario["correo"]);
// };

?>