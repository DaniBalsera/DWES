<?php 
 
/*
*   Dias de la semana
*   @author Daniel Fernández Balsera
*
*/

// Cargar en un array los dias de la semana

$diasSemana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

// Calculamos el tamaño del array

$numDias = count($diasSemana);

// Recorremos el array

for($i = 0; $i < $numDias; $i ++)

{

    echo $diasSemana[$i];
    echo '</br></br>';
}

echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/EjerciciosClase/ArrayDiasSemana.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";

?>