<?php
require_once 'conf/conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_POST['imagen'];
    $rutaImagen = DIRIMAGES . $imagen;
    $rutaCopia = DIRIMAGES . 'copia_' . $imagen;

    if (file_exists($rutaImagen)) {
        copy($rutaImagen, $rutaCopia);
    }

    // Redireccionar a la página de administración
    header("Location: admin.php");
    exit;
}
?>