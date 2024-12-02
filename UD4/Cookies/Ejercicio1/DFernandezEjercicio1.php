<?php
/*Escriba una página que permita crear una cookie de duración limitada,
comprobar el estado de la cookie y destruirla.

Para que sea mas eficiente, vamos a crear un formulario de 3 botones, en el que
cada uno se encargara de una funcion distinta

    - Crear cookie
    - Comprobar cookie
    - Borrar cookie

*/

function crearCookie($nombre, $valor, $expiracion) {
    setcookie($nombre, $valor, time() + $expiracion,"/");
    echo "Cookie creada con exito";
}

function comprobarCookie($nombre){
    if(isset($_COOKIE[$nombre])){
    echo "Valor de la cookie: ". $_COOKIE[$nombre];
    }
    else{
    echo "No hay ninguna cookie creada";
    }
}

function eliminarCookie($nombre){
    setCookie( $nombre, "", time() - 3600,"/");
    unset($_COOKIE[$nombre]);
    echo "La cookie: " .  $nombre . " ha sido eliminada";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkeo de cookies</title>
</head>
<body>
    <form action="" method="POST">
    <button type="submit" name="crear" value="crear">Crear cookie</button>
    <button type="submit" name="comprobar" value="comprobar">Comprobar cookie</button>
    <button type="submit" name="eliminar" value="eliminar">Destruir Cookie</button>

    <?php

    if(isset($_POST['crear'])){
        crearCookie("CookieDani", "Cookie de Daniel", 60,"/");
    } elseif(isset($_POST['comprobar'])){
        comprobarCookie("CookieDani");
    } elseif(isset($_POST['eliminar'])){
        eliminarCookie("CookieDani");
    }
    ?>

    </form>
</body>
</html>