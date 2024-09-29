<?php 

//Declaramos las variables para nuestra fecha de nacimiento y para la fecha actual
$fechaNacimiento = new DateTime("2000-08-19");
$fechaActual  = new DateTime();

// Usando la funcion diff para sacar la diferencia entre años
$diferencia = $fechaActual->diff($fechaNacimiento);

// Usamos y, para representar la diferencia en años.
echo "Mi edad es: $diferencia->y" ;
?>