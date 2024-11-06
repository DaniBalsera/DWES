<?php   

/**
 * 
 * Test 1 para comprobar el manejo de fichero de texto
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 */


include "./conf/config.php";
$desglose = [];
$aUsuarios = []; 

// Abrir fichero

$file = fopen("RegMisAlu.csv", "r");

$alumno="";

// Saltar líneas de cabecera
for($i = 0; $i < LINE_CABECERA; $i++){
    fgets($file);
}

while(!feof($file)){

    $alumno = fgets($file);
    $alumno_st = str_replace($caracteresBusqueda, $caracteresRemplaza, $alumno);
    $alumno_min = strtolower($alumno_st);

    $desglose = explode(" ", $alumno_min);
    

    $nombreUsuarioPrincipal = substr($desglose[0], 1, 2) . substr($desglose[1], 0, 2) . substr($desglose[2], 0, 2);
    $nombreUsuarioNuevo = $nombreUsuarioPrincipal;
    $contador = 1;

 
    while (in_array($nombreUsuarioNuevo, $aUsuarios)) {
    
        $nombreUsuarioNuevo = $nombreUsuarioPrincipal . $contador;
        $contador++;
    }

    array_push($aUsuarios, $nombreUsuarioNuevo);


    echo $nombreUsuarioNuevo . "</br>";
}

fclose($file);

?>
