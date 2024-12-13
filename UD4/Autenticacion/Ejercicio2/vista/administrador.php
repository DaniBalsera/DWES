<?php 
/**
 * Vista del Administrador
 */

// Iniciar sesión
session_start();

// Verificar que el usuario es un administrador
if ($_SESSION["tipo"] != "admin") {
    header("Location: ../ej2.php"); // Redirigir al usuario a la página principal si no es administrador
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Administrador</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1> <!-- Nombre del usuario autenticado -->
    <p>Zona exclusiva para el administrador</p> <!-- Información sobre el área para el administrador -->
    <button onclick="history.go(-1);">Volver al menú principal</button> <!-- Botón para volver al menú principal -->
</body>
</html>
