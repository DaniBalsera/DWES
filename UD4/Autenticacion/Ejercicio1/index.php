<?php

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */


// Incluir la configuración de la aplicación
include "./config/config.php"; // Incluimos la configuración

// Declaramos una variable que determine si el usuario se ha logueado o no
$auth = false; 
$user = ""; 
$pass = ""; 
$error = ""; 

// Iniciamos la sesión
session_start(); // Inicia la sesión para mantener el estado del usuario

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST["enviar"])) {
    $user = clearData($_POST["user"]); // Limpiar y almacenar el nombre de usuario ingresado
    $pass = clearData($_POST["pass"]); // Limpiar y almacenar la contraseña ingresada

    // Comprobamos que el usuario exista en la lista de usuarios
    foreach ($users as $valor => $usuario) { 
        if ($user === $usuario[0] && $pass === $usuario[1]) { // Compara el nombre de usuario y la contraseña
            $auth = true; // Autenticación exitosa
            $_SESSION["usuario"] = $user; // Guardar el usuario autenticado en la sesión
            break; // Salir del bucle ya que se encontró una coincidencia
        }
    }

    // Si la autenticación es incorrecta, mostrar un mensaje de error
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
    <title>Ejercicio 1 autenticacion - Daniel Fernandez</title>
</head>
<body>
    <h1>Ejercicio 1 autenticacion - Daniel Fernandez</h1>
    <?php
    // Si el usuario no está autenticado, mostrar el formulario de inicio de sesión
    if (!$auth) {
    ?>
        <form method="POST" action="">
            <!-- Campo de entrada para el nombre de usuario -->
            <label>Usuario: </label>
            <input type="text" name="user"> <br/><br/>
            <!-- Campo de entrada para la contraseña -->
            <label>Contraseña: </label>
            <input type="password" name="pass">  <br/><br/>
        
            <input type="submit" name="enviar" value="Iniciar sesión">    <!-- Botón para enviar el formulario -->
            <!-- Mostrar mensaje de error si hay uno -->
            <?php echo $error; ?>
        </form>
    <?php
    } else {
        // Si el usuario está autenticado, mostrar un mensaje de bienvenida
        echo "<h2>Bienvenido " . $_SESSION["usuario"] . "</h2>";
    ?>
        <h2>Acceso privado</h2>
        <p>Inicio de sesión exitoso</p>
    <?php
    }
    ?>
    <h3>Acceso público</h3>
    <p>Bienvenido a la zona pública</p>
    <?php
    // Si el usuario está autenticado, mostrar un enlace para cerrar sesión
    if ($auth) {
        echo "<a href='./config/cierreSesion.php'>Cerrar sesión</a>";
    }
    ?>
</body>
</html>
