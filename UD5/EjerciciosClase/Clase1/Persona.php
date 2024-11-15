<?php


/**  Creacion clase persona */

class Persona{

    /**  Creamos variables privadas */
    private $_nombre;
    private $_apellido1;
    private $_apellido2;


    /** Creamos un constructor */

    public function __construct($nombre,$apellido1,$apellido2){
        $this-> _nombre = $nombre; //pseudo variable
        $this-> _apellido1 = $apellido1;
        $this-> _apellido2 = $apellido2;

    }


    /**
     * Función que devuelve el nombre completo
     * 
     * @return string
     * 
     */

    public function nombre(){

        return $this -> _nombre . " " . $this -> _apellido1 . " " . $this -> _apellido2;
    }

    /** Una funcion que muestre Hola Mundo*/

    
    public function saludo(){

        echo "Hola Mundo";
    }



}



?>