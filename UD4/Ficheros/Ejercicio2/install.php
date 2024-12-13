<?php
require_once 'conf/conf.php';

// Comprobar espacio en disco
$espacioDisponible = disk_free_space("/") / (1024 * 1024 * 1024); // Convertir a GB
if ($espacioDisponible < 10) {
    die("Error: El sistema necesita más de 10 GB de almacenamiento disponible.");
}

// Solicitar credenciales del administrador
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = $_POST['admin_user'];
    $adminPass = password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);

    // Guardar credenciales en un archivo
    file_put_contents(ADMIN_CREDENTIALS, "<?php\n\$adminUser = '$adminUser';\n\$adminPass = '$adminPass';\n?>");

    // Crear directorio para almacenar las imágenes
    if (!file_exists(DIRIMAGES)) {
        mkdir(DIRIMAGES, 0777, true);
    }

    // Redireccionar al inicio de la aplicación
    header("Location: index.php");

    // Borrar el instalador
    unlink(__FILE__);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalación de la Galería de Fotos</title>
</head>
<body>
    <h1>Instalación de la Galería de Fotos</h1>
    <form action="install.php" method="post">
        <label for="admin_user">Usuario Administrador:</label>
        <input type="text" name="admin_user" id="admin_user" required>
        <br><br>
        <label for="admin_pass">Contraseña Administrador:</label>
        <input type="password" name="admin_pass" id="admin_pass" required>
        <br><br>
        <input type="submit" value="Instalar">
    </form>
</body>
</html>