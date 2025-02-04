<?php 

namespace App\Models;

class Animales extends DBAbstractModel{

    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    // Creamos los parámetros

    private $id;
    private $nombre;
    private $categoria_id;
    private $raza;
    private $foto;

    // Creamos los setters y getters

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
        return $this;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    // Creamos los métodos abstractos de la clase DBAbstractModel

    public function get(){}
    public function set(){}
    public function edit(){}
    public function delete(){}

    public function getAnimalesByFilter($filtro){
        $this ->query = "SELECT * FROM animales WHERE nombre LIKE '%$filtro%' OR raza LIKE '%$filtro%'";
        $this ->parametros["filter"] = '%'.$filtro.'%';
        $this ->get_results_from_query();
        return $this->rows;
    }


}

?>