<?php

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */


/** Importamos de la clase persona  y alumno*/

require_once "./Persona.php";
require_once "./Alumno.php";

/** Creamos un objeto */ 

$persona = new Persona("Daniel","Fernández","Balsera");
$alumno = new Alumno("12345");
/** Acceder al metodo saludo que se encuentra en Persona.php */


$alumno->saludo();
echo "<br/>";

?>