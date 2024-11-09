<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 *  Escriba una página que compruebe si el navegador permite crear cookies y se
    lo diga al usuario (mediante una o más páginas).
 * 
 * 
 * 
 */


 // Pag 1: Esta página intentará establecer una cookie y redirigirá a una segunda página.


// Creamos y establecemos la cookie

$nombreCookie = "CookiePermisos";

setcookie($nombreCookie,"1", time() +3600);


// Redirigimos a la segunda página

header("Location: DFernandezEj2_2.php");