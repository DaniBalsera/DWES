<?php

/**
 * Ejercicio 2 de autenticación - Daniel Fernández Balsera
 */

// Incluir la configuración de la aplicación
include "./config/config.php";

// Inicializar variables
$auth = false; // Indicador de autenticación
$user = ""; // Nombre de usuario ingresado
$pass = ""; // Contraseña ingresada
$error = ""; // Mensaje de error

// Iniciar la sesión
session_start(); // Inicia la sesión para mantener el estado del usuario

// Verificar si hay una sesión activa
if (isset($_SESSION["usuario"])) {
    $auth = true; // Si hay una sesión activa, el usuario está autenticado
}

// Procesar el formulario de inicio de sesión
if (isset($_POST["enviar"])) {
    // Limpiar los datos recibidos del formulario
    $user = clearData($_POST["user"]); // Limpiar y almacenar el nombre de usuario ingresado
    $pass = clearData($_POST["pass"]); // Limpiar y almacenar la contraseña ingresada

    // Verificar si las credenciales son correctas
    foreach ($users as $valor => $usuario) {
        if ($user === $usuario[0] && $pass === $usuario[1]) { // Compara el nombre de usuario y la contraseña
            $auth = true; // Autenticación exitosa
            $_SESSION["usuario"] = $user; // Guardar el usuario en la sesión
            $_SESSION["tipo"] = $user[2]; // Guardar el tipo de usuario (admin o user)
            break; // Salir del bucle ya que se encontró una coincidencia
        }
    }

    // Si la autenticación falla, mostrar un mensaje de error
    if (!$auth) {
        $error = "Credenciales incorrectas"; // Mensaje de error si la autenticación falla
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 de autenticación - Daniel Fernandez</title>
</head>
<body>
    <h1>Ejercicio 2 de autenticación</h1>

    <?php 
        // Si el usuario no está autenticado, mostrar el formulario de inicio de sesión
        if (!$auth) {
    ?>
    <form method="POST" action="">
        <!-- Campo de entrada para el nombre de usuario -->
        <label>Usuario:</label>
        <input type="text" name="user" required><br/><br/>
        <!-- Campo de entrada para la contraseña -->
        <label>Contraseña:</label>
        <input type="password" name="pass" required><br/><br/>
        <input type="submit" name="enviar" value="Iniciar sesión">   <!-- Botón para enviar el formulario -->
        <!-- Mostrar mensaje de error si hay uno -->
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p> <!-- Muestra el mensaje de error en color rojo -->
        <?php endif; ?>
    </form>
    <?php
        } else {
            // Si el usuario está autenticado, redirigir a la vista correspondiente
            if ($_SESSION["tipo"] === "admin") {
                header("Location: ./vista/administrador.php"); // Redirigir a la vista del administrador
            } elseif ($_SESSION["tipo"] === "user") {
                header("Location: ./vista/usuario.php"); // Redirigir a la vista del usuario
            }
        }
    ?>
    
    <h3>Zona pública</h3>
    <p>Bienvenido a la zona pública</p>

    <?php
        // Si el usuario está autenticado, mostrar el enlace para cerrar sesión
        if ($auth) {
            echo "<a href='./config/cierreSesion.php'>Cerrar sesión</a>"; // Enlace para cerrar sesión
        }
    ?>
</body>
</html>
