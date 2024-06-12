<?php
require_once('conexion.php');  // Use require_once with a lowercase "o"
$conexion->select_db("Imagen");  // Add this line after connection

if (empty($_POST['titulo'])) {
    echo "Por favor inserte un titulo a su obra de arte";
} else {
    $titulo = $_POST['titulo'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $query= "INSERT INTO imagen (titulo, imagen) VALUES ('$titulo', '$imagen')";
    $resultado = $conexion->query($query);
    if ($resultado) {
        echo "Imagen subida!";
    }else{
        echo "ERROR 33: No se ha podido subir tu imagen";
    }
    }
?>



<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <title>What a feeling</title>
        <link rel="stylesheet" type="text/css" href="style.css"
    </HEAD>
    <BODY>
        <h1>Titulo</h1>
        <form method="POST" enctype="multipart/form-data">
            <h1>ingrese los datos correspondientes</h1>
            <label>Tiutlo</label>
            <input type="text" name="titulo"><br><br>
            <input type="file" name="imagen" required=""><br><br>
            <center>
                <input type="submit" name="guardar" value="Guardar">
                <button><a href="consulta.php">Galeria</a></button>
                <INPUT TYPE="button" VALUE="Home" ONCLICK="window.location.href='../index.html'">
            </center>
        </form>
    </BODY>
</HTML>