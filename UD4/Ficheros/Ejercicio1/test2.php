<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
    if (isset($_GET['script'])) {
        $rutaScript = urldecode($_GET['script']);
        if (file_exists($rutaScript)) {
            echo "<p>Archivo guardado en carpeta upload del servidor</p>";
            echo "<pre>" . htmlspecialchars(file_get_contents($rutaScript)) . "</pre>";
        } else {
            echo "<p>No se encontró el script.</p>";
        }
    } else {
        echo "<p>No se especificó ningún script.</p>";
    }
    ?>
</body>
</html>