<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos</title>
</head>
<body>
    <h1>Subida de Archivos</h1>
    <form action="procesaFormulario.php" method="post" enctype="multipart/form-data">
        <label for="grupo">Grupo:</label>
        <select name="grupo" id="grupo">
            <?php
            require_once 'conf/conf.php';
            foreach ($grupos as $grupo) {
                echo "<option value=\"$grupo\">$grupo</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="archivo">Archivo CSV:</label>
        <input type="file" name="archivo" id="archivo" accept=".csv">
        <br><br>
        <input type="submit" value="Subir Archivo">
    </form>
</body>
</html>