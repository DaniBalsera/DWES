<?php
/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

// Cargamos el array de meses
// Trabajo para casa: febrero tiene que ser un array indexado con dos valores
$meses  =  array (
    "Enero" => 31,
    "Febrero" => array(28, 29), // Febrero ahora es un array con dos valores
    "Marzo" => 31,
    "Abril" => 30,
    "Mayo" => 31,
    "Junio" => 30,
    "Julio" => 31,
    "Agosto" => 31,
    "Septiembre" => 30,
    "Octubre" => 31,
    "Noviembre" => 30,
    "Diciembre" => 31,
);

// Recorremos el array por valor con foreach
foreach ($meses as $clave => $valor) {
    // Comprobamos si el valor es un array (en el caso de febrero)
    if (is_array($valor)) {
        echo "$clave tiene " . $valor[0] . " días en un año normal y " . $valor[1] . " días en un año bisiesto.</br></br>";
    } else {
        echo "$clave tiene $valor días.</br></br>";
    }
}


echo "<br>";
        echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/EjerciciosClase/ArrayDiasMes.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";
?>
