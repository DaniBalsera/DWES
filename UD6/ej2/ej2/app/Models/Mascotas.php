<?php
# Importar modelo de abstracción de base de datos

namespace App\Models;
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

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function set() {
        $fecha = new \DateTime();
        $this->query = "INSERT INTO perros(nombre, peso, raza, created_at) VALUES (:nombre, :peso, :raza, :created_at)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['peso'] = $this->peso;
        $this->parametros['raza'] = $this->raza;
        $this->parametros['created_at'] = date( 'Y-m-d H:i:s', $fecha->getTimestamp());
        $this->get_results_from_query();
        $this->mensaje = 'mascotas añadidas';
    }

    public function get($id = '') {

        $this->query = "SELECT * FROM perros WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'mascota encontrada';
        } else {
            $this->mensaje = 'mascota no encontrada';
        }
        return $this->rows[0]??null;
    }

    public function getAll() {
        $this->query = "SELECT * FROM perros";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function edit($id = '') {
        $fecha = new \DateTime();
        $this->query = "UPDATE perros SET nombre = :nombre, peso = :peso, raza = :raza, updated_at = :updated_at WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['peso'] = $this->peso;
        $this->parametros['raza'] = $this->raza;
        $this->parametros['updated_at'] = date('Y-m-d H:i:s', $fecha->getTimestamp());
        $this->get_results_from_query();
        $this->mensaje = 'Mascota modificada'; 
    }

    public function delete($id = '') {
        $this->query = "DELETE FROM perros WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'mascota eliminada';
    }
}
?>