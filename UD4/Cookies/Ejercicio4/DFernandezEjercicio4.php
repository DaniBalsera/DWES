<?php
/**
 * @author Daniel Fernández Balsera
 * 
 *  Ejercicio 4
 *  
 */

/*Si no existe la cookie contador, la creamos*/
if(!isset($_COOKIE["contador"])){
    setcookie("contador",0, time() +3600); // Creación de la cookie
}else{
    $valor = $_COOKIE["contador"] + 1; /** Si existe, incrementamos el valor de esta +1, guardándolo en una variable */
    setcookie("contador", $valor, time() + 3600); /** Añadimos ese valor a la cookie */
}

echo $_COOKIE["contador"]; /**Mostramos la cookie */



?>