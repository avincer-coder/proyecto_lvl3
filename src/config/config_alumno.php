<?php 
$host = "localhost";
$dbname = "proyecto_final";
$usuario = "abc";
$contraseña = "";

$con = new PDO("mysql:host=$host;dbname=$dbname","$usuario","$contraseña");
// Crear un try catch para la conexion si algo corre mal.
?>