<?php
include "conexion.php";  // Assuming you've established a MySQLi connection in conexion.php
?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <title>What a feeling</title>
</HEAD>
<BODY>
    <table>
        <tr>
            <th>Titulo  </th>
            <th>Imagen  </th>
        </tr>
        <?php
        $stmt = $conexion->prepare("SELECT * FROM imagen");
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        if ($rows) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['titulo'] ?></td>
                    <td><img height="200px" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']) ?>"></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <br>
    <button><a href="index.php">Regresar</a></button>
</BODY>
</HTML>