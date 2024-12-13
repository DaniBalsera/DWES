<?php
require_once 'conf/conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_POST['imagen'];
    $nuevoNombre = $_POST['nuevo_nombre'];
    $rutaImagen = DIRIMAGES . $imagen;
    $rutaNueva = DIRIMAGES . $nuevoNombre;

    if (file_exists($rutaImagen)) {
        rename($rutaImagen, $rutaNueva);
    }

    // Redireccionar a la página de administración
    header("Location: admin.php");
    exit;
}
?>