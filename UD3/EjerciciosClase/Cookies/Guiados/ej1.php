<?php
/**
 * 
 * Crear una cookie de duracion limitada
 * 
 * 
 */



 //Crear cookie

 
 setcookie("cookie", "Hello World!", time() +60 );      // Nombre, valor, F.Expiración

 echo "Inicio";
 echo "<br>";




 // Comprobamos que existen las cookies

 if(isset($_COOKIE["cookie"])){


    echo $_COOKIE['cookie'] . "<br>";
 }


echo "Fin";

?>