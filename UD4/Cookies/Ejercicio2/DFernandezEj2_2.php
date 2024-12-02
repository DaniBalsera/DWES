
<?php 
/** 
 * 
 * Si entras aqui sin haber pasado por la otra pagina te dira que no tienes permisos, pero si accedes
 * primero a la anterior si te los dara
 * 
*/

// Esta página comprueba si la cookie está presente y muestra un mensaje al usuario.

$nombreCookie = "CookiePermisos";

// Comprobar si la cookie está establecida

if(isset($_COOKIE[$nombreCookie])){

    echo "¡Este navegador permite trabajar con cookies!<br>";
    echo "La cookie ha sido establecida correctamente.";

}

else{

    echo "Este navegador NO permite trabajar con cookies.<br>";
    echo "No se ha podido establecer la cookie.";

}

?>