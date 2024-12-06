<?php 

/**Si existe la cookie, recogemos el tiempo que ha pasado desde la ultima visita del usuario*/

if(!isset($_COOKIE["tiempo"])){
    setcookie("tiempo", time(), time() + 150);
    $tiempoTranscurrido = strval(0);
}else{
    $tiempo = $_COOKIE["tiempo"];
    $tiempoTranscurrido = strval(time() - $tiempo);
    setcookie("tiempo", time(), time() +150);
}

echo "Tiempo transcurrido desde su ultima visita: ". $tiempoTranscurrido;

?>