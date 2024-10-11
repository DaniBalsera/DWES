




<?php 

/**

@author Daniel Fernandez Balsera

Actividad 1 Arrays

*/

// Array para los meses del año
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$cantidadMeses = count($meses);

// Crear la tabla e incluir un encabezado
echo "<table border='1'>";
echo "<tr><th>MESES DEL AÑO</th></tr>";

// Iterar sobre el array de meses y agregar cada mes en una fila de la tabla
for ($i =  0; $i < $cantidadMeses; $i++) {
    echo "<tr><td>$meses[$i]</td></tr>";
}

// Cerrar la tabla
echo "</table>";
?>