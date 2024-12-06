<?php
/**
 * 
 * Test para comprobar el manejo del fichero de texto
 * 
 * @author 
 * 
 */

include './conf/config.php';
//Declaracion de variables
$aUsuario = array();
$desglose = [];//array
$alumno = '';
$nombreUsuario= '';
$contador = 0;


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
    
    $desglose = explode(' ', $alumno_min);

    $nombreUsuario = substr($desglose[0], 0 ,2).substr($desglose[1],0,2).substr($desglose[2] ?? "",0,2);

    if (in_array($nombreUsuario, $aUsuario)){
        $contador ++;
        $nombreUsuario =  $nombreUsuario . $contador;
    }else {
        array_push($aUsuario, $nombreUsuario);
    }

    
    //Ejemplo con for each
    //foreach ($desglose as $value) {
    //    $nombreUsuario = $nombreUsuario . substr($value, 0, 2);
    //}

    echo $nombreUsuario . '<br/>';
}

fclose($file);

?>