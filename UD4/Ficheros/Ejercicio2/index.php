<?php
require_once 'conf/conf.php';

// Obtener lista de imágenes
$imagenes = array_diff(scandir(DIRIMAGES), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galería de Fotos</title>
</head>
<body>
    <h1>Galería de Fotos</h1>
    <div>
        <?php foreach ($imagenes as $imagen): ?>
            <img src="<?php echo DIRIMAGES . $imagen; ?>" alt="<?php echo $imagen; ?>" style="width:200px;height:auto;">
        <?php endforeach; ?>
    </div>
    <a href="admin.php">Administrar Imágenes</a>
</body>
</html>