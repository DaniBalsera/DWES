<?php
require_once 'conf/conf.php';

if (!file_exists(ADMIN_CREDENTIALS)) {
    die("Error: El archivo de credenciales del administrador no existe. Por favor, ejecute el instalador.");
}

require_once ADMIN_CREDENTIALS;

// Verificar credenciales del administrador
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['admin_user'] == $adminUser && password_verify($_POST['admin_pass'], $adminPass)) {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $error = "Credenciales incorrectas.";
        }
    } else {
        $error = "";
    }
    if (!isset($_SESSION['admin_logged_in'])) {
        echo "<form action='admin.php' method='post'>
                <label for='admin_user'>Usuario Administrador:</label>
                <input type='text' name='admin_user' id='admin_user' required>
                <br><br>
                <label for='admin_pass'>Contraseña Administrador:</label>
                <input type='password' name='admin_pass' id='admin_pass' required>
                <br><br>
                <input type='submit' value='Iniciar Sesión'>
              </form>
              <p>$error</p>";
        exit;
    }
}

// Obtener lista de imágenes
$imagenes = array_diff(scandir(DIRIMAGES), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Imágenes</title>
</head>
<body>
    <h1>Administrar Imágenes</h1>
    <h2>Subir Imagen</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" required>
        <input type="submit" value="Subir Imagen">
    </form>
    <h2>Imágenes</h2>
    <div>
        <?php foreach ($imagenes as $imagen): ?>
            <div>
                <img src="<?php echo DIRIMAGES . $imagen; ?>" alt="<?php echo $imagen; ?>" style="width:100px;height:auto;">
                <form action="delete.php" method="post" style="display:inline;">
                    <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                    <input type="submit" value="Borrar">
                </form>
                <form action="copy.php" method="post" style="display:inline;">
                    <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                    <input type="submit" value="Copiar">
                </form>
                <form action="rename.php" method="post" style="display:inline;">
                    <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                    <input type="text" name="nuevo_nombre" required>
                    <input type="submit" value="Renombrar">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php">Volver a la Galería</a>
</body>
</html>