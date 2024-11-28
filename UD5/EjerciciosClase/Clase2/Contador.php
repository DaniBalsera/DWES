<?php
/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 */


 /** Creamos la clase Contador */

 class Contador{

    private $contador; // Declaramos variable privada contador
    private static $instancia = 0; // Declaramos variable privada estática instancia

    /**
     * 
     * Creamos el constructor
     * @param mixed $cont
     * 
     */

    public function __construct($cont = 0){

        $this -> contador = $cont;
        self::$instancia ++; /*Accedemos a la variable instancia de esta misma clase y la incrementamos */

    }


    /** 
     * Creamos método para contar
     * @return static
     * 
     * 
     */

    public function contar(){
        $this -> contador ++;
        return $this;
    }


    /**
     * 
     * Creamos método para devolver el número de instancias
     * @return instancias (cantidad)
     * 
     */


    public static function nInstancias(){
        return self::$instancia;
    }




    /**
     * 
     * Creamos el método toString
     * 
     * @return string
     * 
     */

     public function __toString(){
        return (string) $this ->contador;
     }
 }

?>