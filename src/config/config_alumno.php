<?php 
//Este usario es de solo lectura
$host = "localhost";
$dbname = "proyecto_final";
$usuario = "final_lectura";
$contraseña = "contrasena_lectura";

$con = new PDO("mysql:host=$host;dbname=$dbname","$usuario","$contraseña");
// Crear un try catch para la conexion si algo corre mal.
?>