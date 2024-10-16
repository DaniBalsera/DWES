<?php 

/**
 * 
 * 
 * 
 * @author Daniel Fernandez Balsera
 * 
 * 
 * 
 */


// Declaramos el array de paises (indexado y multidimensional con mas arrays asociativos)

$aPaises = array(

    array('id' => 'es', 'pais' => 'España' , 'capital' => 'Madrid'),
    array('id' => 'it', 'pais' => 'Italia' , 'capital' => 'Roma'),
    array('id' => 'fr', 'pais' => 'Francia' , 'capital' => 'París'),
    


);


//Opcion primera

echo "Opcion 1<br/>";

$nombrePaises = array();
foreach ($aPaises as $pais)
{
    $nombrePaises[] = $pais['pais'];
}

print_r ($nombrePaises);


// Opcion 2. Con funciones anonimas

echo "<br>Opcion 2<br/>";

// array_map devuelve un array
// despues de pasar cada uno de los elementos del array
// (segundo parámetro)
// por la función (primer parámetro)

$nombrePaises = array_map(function ($pais){
return $pais['pais'];
},$aPaises);

print_r($nombrePaises);

?>