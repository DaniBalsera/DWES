<?php 



if(!isset($_COOKIE["tiempo"])){ /**Si no existe la cookie, la creamos */
    setcookie("tiempo", time(), time() + 150);
    $tiempoTranscurrido = strval(0);
}else{
    $tiempo = $_COOKIE["tiempo"];
    $tiempoTranscurrido = strval(time() - $tiempo); /**Si existe la cookie, recogemos el tiempo que ha pasado desde la ultima visita del usuario*/
    setcookie("tiempo", time(), time() +150);
}

echo "Tiempo transcurrido desde su ultima visita: ". $tiempoTranscurrido;

?>