<?php
session_start();

// Verificar si el usuario está autenticado y tiene rol de administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    die("Acceso denegado.");
    header("Location: index.php");
}

// Obtener las comandas pendientes
$comandasPendientes = glob("comanda_*_pendiente.txt");
$mensaje = "";

// Procesar elaboración de comanda
if (isset($_POST['elaborar'])) {
    $archivo = $_POST['archivo'];
    $nuevoNombre = str_replace("_pendiente", "_elaborada", $archivo);
    
    if (rename($archivo, $nuevoNombre)) {
        $mensaje = "Comanda elaborada correctamente.";
    } else {
        $mensaje = "Error al marcar la comanda como elaborada.";
    }
    
    // Actualizar lista de comandas pendientes
    $comandasPendientes = glob("comanda_*_pendiente.txt");
}

// Descargar ticket
if (isset($_POST['descargar'])) {
    $archivo = $_POST['archivo'];
    header('Content-Disposition: attachment; filename="' . basename($archivo) . '"');
    readfile($archivo);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comandas</title>
</head>
<body>
    <h1>Gestión de Comandas</h1>
    <p><?php echo $mensaje; ?></p>
    <h2>Comandas Pendientes</h2>
    <ul>
        <?php foreach ($comandasPendientes as $comanda): ?>
            <li>
                <?php echo basename($comanda); ?>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="archivo" value="<?php echo $comanda; ?>">
                    <button type="submit" name="elaborar">Marcar como elaborada</button>
                </form>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="archivo" value="<?php echo $comanda; ?>">
                    <button type="submit" name="descargar">Descargar ticket</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>
    <a href="index.php">Volver atrás</a>
</body>
</html>
