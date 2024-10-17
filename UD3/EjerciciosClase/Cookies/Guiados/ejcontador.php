<?php   


/**
 * 
 * Contador con cookies
 * 
 */

// Preparamos la variable que se va a contar


if(!isset($_COOKIE["contador"])){

    // Creamos la cookie

    setcookie("contador" , 0 , time() + 3600);


}

// Mostramos la cookie

else{

    $valor = $_COOKIE["contador"] + 1;
    setcookie("contador", $valor, time() + 3600);
}


echo $_COOKIE["contador"];


?>