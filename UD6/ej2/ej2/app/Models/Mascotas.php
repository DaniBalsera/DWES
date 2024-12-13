<?php
# Importar modelo de abstracción de base de datos
require_once('DBAbstractModel.php');

class Mascotas extends DBAbstractModel {
    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $peso;
    private $raza;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO perros(nombre, peso, raza) VALUES (:nombre, :peso, :raza)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['peso'] = $this->peso;
        $this->parametros['raza'] = $this->raza;
        $this->get_results_from_query();
        $this->mensaje = 'mascotas añadidas';
    }

    public function get($id = '') {
        if ($id != '') {
            $this->query = "SELECT * FROM perros WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'mascota encontrada';
        } else {
            $this->mensaje = 'mascota no encontrada';
        }
        return $this->rows;
    }

    public static function getAll() {
        $instance = self::getInstancia();
        $instance->query = "SELECT * FROM perros";
        $instance->get_results_from_query();
        
        $mascotas = [];
        foreach ($instance->rows as $row) {
            $mascota = new Mascotas();
            $mascota->id = $row['id'];
            $mascota->nombre = $row['nombre'];
            $mascota->peso = $row['peso'];
            $mascota->raza = $row['raza'];
            $mascotas[] = $mascota;
        }
        
        return $mascotas;
    }

    public function edit($id = '') {
        $this->query = "UPDATE perros SET nombre = :nombre, peso = :peso, raza = :raza WHERE id = :id";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['peso'] = $this->peso;
        $this->parametros['raza'] = $this->raza;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'mascota modificada';
    }

    public function delete($id = '') {
        $this->query = "DELETE FROM perros WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'mascota eliminada';
    }
}
?>