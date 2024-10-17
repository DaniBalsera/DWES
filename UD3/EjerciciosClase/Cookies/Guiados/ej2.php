<?php 
/**
 * 
 * Borrado de cookies
 * 
 * 
 */


 if(isset($_COOKIE["cookie"])){

    setcookie("cookie", "Hello World!", time() -60 );      // Nombre, valor, F.Expiración
    echo "Cookie borrada";

 }


?>