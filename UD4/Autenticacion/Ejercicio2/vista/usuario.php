<?php 
/**
 * Vista del Usuario
 */

// Iniciar sesión
session_start();

// Verificar que el usuario es un usuario regular o un administrador
if ($_SESSION["tipo"] != "user" && $_SESSION["tipo"] != "admin") {
    header("Location: ../ej2.php"); // Redirigir al usuario a la página principal si no es un usuario
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1> <!-- Nombre del usuario autenticado -->
    <p>Sección exclusiva para usuarios regulares y administradores.</p> <!-- Información sobre el área para los usuarios -->
    
    <!-- Enlace al menú principal, si el usuario desea regresar -->
    <button onclick="history.go(-1);">Volver al menú principal</button>
</body>
</html>
