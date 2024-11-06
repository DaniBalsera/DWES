<?php
/**
 * Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.
 * @author Daniel Fernández Balsera
 */

// Creamos el nombre de la cookie
$nombreCookie = "CookieDani";

// Comprobar si la cookie ya existe
if (isset($_COOKIE[$nombreCookie])) {
    // Mostrar el valor de la cookie si ya existe
    echo "La cookie ya existe: " . $_COOKIE[$nombreCookie] . "<br>";
    
    // Destruir la cookie si ha expirado (pasaron más de 60 segundos desde su creación)
    if (time() > ($_COOKIE[$nombreCookie.'_time'] ?? 0) + 60) {
        setcookie($nombreCookie, '', time() - 3600); // Establecer una fecha en el pasado para eliminarla
        echo "La cookie ha expirado y ha sido eliminada.<br>";
    }
} else {
    // Crear una cookie con duración limitada de 60 segundos
    setcookie($nombreCookie, "Cookie de Daniel", time() + 60);
    setcookie($nombreCookie.'_time', time(), time() + 60); // Almacena el tiempo de creación
    echo "La cookie se ha creado y expirará en 60 segundos.<br>";
}
?>