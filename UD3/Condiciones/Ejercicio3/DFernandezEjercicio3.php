<?php 

//Declaramos las variables para nuestra fecha de nacimiento y para la fecha actual
$fechaNacimiento = new DateTime("2000-08-19");
$fechaActual  = new DateTime();

// Usando la funcion diff para sacar la diferencia entre años
$diferencia = $fechaActual->diff($fechaNacimiento);

// Usamos y, para representar la diferencia en años.
echo "Mi edad es: $diferencia->y" ;


echo "<br>";
        echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Condiciones/Ejercicio3/DFernandezEjercicio3.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";
?>