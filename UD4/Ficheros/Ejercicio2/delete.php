<?php
require_once 'conf/conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_POST['imagen'];
    $rutaImagen = DIRIMAGES . $imagen;

    if (file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }

    // Redireccionar a la página de administración
    header("Location: admin.php");
    exit;
}
?>