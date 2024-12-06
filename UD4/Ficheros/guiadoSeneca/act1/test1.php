<?php
/**
 * 
 * Test para comprobar el manejo del fichero de texto
 * 
 * @author 
 * 
 */

include './conf/config.php';

//Abrir fichero
$file = fopen("./RegMisAlu.csv", 'r');

//despreciamos lineas cabecera
for ($i=0; $i < LINE_CABECERA; $i++) { 
    fgets($file);
}

//Recorremos el fichero hasta final de fichero con feof
while (!feof($file)) {
    //Cargamos la linea del fichero
    $alumno = fgets($file);
    //Remplazamos los caracteres especiales
    $alumnos_st = str_replace($caracteresBusqueda, $caracteresRemplaza, $alumno);
    //Lo pasamos a minuscula todo
    $alumno_min = strtolower($alumnos_st);
    //se imprime
    echo $alumno_min . '<br/>';
}

fclose($file);

?>