

<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */


/** Importamos de la clase persona */

require_once "./Persona.php";

/**Creamos la clase Alumno
 */
class Alumno extends Persona{


    private $_nie;

    public function __construct($nie){
        $this-> _nie = $nie; //pseudo variable
      
    }
    
    public function saludo(){

        echo parent::saludo();
        echo " Soy un alumno";
        echo "<br/>";
    }



}





?>