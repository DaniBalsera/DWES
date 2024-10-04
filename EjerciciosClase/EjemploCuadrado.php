<?php  
/** 
 * 
 * @author Daniel Fernandez Balsera
 * 
 * 
 * 
*/
$numerosEnteros = array(1,2,3,4,5,6,7,8,9,10,);

// Vamos a usar el array map


$funcionNumeros = array_map(function ($numeros){
    return $numeros * $numeros;
    },$numerosEnteros);
    

print_r($funcionNumeros);


    
?>