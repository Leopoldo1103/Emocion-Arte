<?php
$conexion = new mysqli("localhost", "root", "");

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$db_name = "Imagen";
$conexion->select_db($db_name);
?>