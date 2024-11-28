<?php

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

/** Requerimos el contador */
require_once "Contador.php"; 

/** Obtenemos el numero de instancias */
$nInstancias = Contador::nInstancias();

echo $nInstancias; // Mostramos la primera instancia
echo "<br/>";
/** Creamos varios contadores */

$contador1 = new Contador();
$contador2 = new Contador(100);
$contador3 = new Contador(2);

echo $contador1;
echo "<br/>";
echo $contador2;
echo "<br/>";
echo $contador3;
echo "<br/>";

$contador1 -> contar();
$contador1 -> contar();

$contador2 -> contar();
$contador2 -> contar();

$contador3 -> contar();
$contador3 -> contar();

echo $contador1;
echo "<br/>";
echo $contador2;
echo "<br/>";
echo $contador3;
echo "<br/>";

$nInstancias = Contador::nInstancias();

echo $nInstancias;

?>