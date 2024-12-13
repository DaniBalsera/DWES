<?php
require_once 'conf/conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_FILES['imagen'];

    // Validar el archivo
    if ($imagen['size'] > MAXSIZE) {
        die("El archivo es demasiado grande.");
    }

    $ext = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedExt)) {
        die("Extensión de archivo no permitida.");
    }

    if (!in_array($imagen['type'], $allowedFormat)) {
        die("Formato de archivo no permitido.");
    }

    // Mover el archivo al directorio de imágenes
    $rutaImagen = DIRIMAGES . basename($imagen['name']);
    if (!move_uploaded_file($imagen['tmp_name'], $rutaImagen)) {
        die("Error al subir el archivo.");
    }

    // Redireccionar a la página de administración
    header("Location: admin.php");
    exit;
}
?>