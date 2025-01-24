<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class DBAbstractModel
{
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_name = 'portfolio';
    protected $query;
    protected $rows = array();
    private $conn;
    public $mensaje = 'Hecho';
    protected $parametros = array(); // Definir la propiedad parametros

    # métodos abstractos para CRUD de clases que hereden
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit($data = array());
    abstract protected function delete($id = '');

    # Crear conexión a la base de datos
    protected function open_connection()
    {
        $dsn = 'mysql:host=' . self::$db_host . ';dbname=' . $this->db_name;
        try {
            $this->conn = new PDO($dsn, self::$db_user, self::$db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->mensaje = 'Error de conexión: ' . $e->getMessage();
        }
    }

    # Desconectar la base de datos
    protected function close_connection()
    {
        $this->conn = null;
    }

    # Ejecutar una consulta simple del tipo INSERT, DELETE, UPDATE
    protected function execute_single_query()
    {
        if ($_POST) {
            $this->open_connection();
            try {
                $stmt = $this->conn->prepare($this->query);
                foreach ($this->parametros as $param => $value) {
                    $stmt->bindValue(':' . $param, $value);
                }
                $stmt->execute();
                $this->close_connection();
            } catch (PDOException $e) {
                $this->mensaje = 'Error en consulta: ' . $e->getMessage();
            }
        } else {
            $this->mensaje = 'Método no permitido';
        }
    }

    # Traer resultados de una consulta en un Array
    # Consulta que devuelve tuplas de la tabla.
    protected function get_results_from_query()
    {
        $this->open_connection();
        if (($_stmt = $this->conn->prepare($this->query))) {
            # PREG_PATTERN_ORDER flag para especificar como se cargan los resultados en $named.
            if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
                $_named = array_pop($_named);
                foreach ($_named as $_param) {
                    $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
                }
            }

            try {
                if (!$_stmt->execute()) {
                    printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
                }

                $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);
                $_stmt->closeCursor();
            } catch (PDOException $e) {
                printf("Error en consulta %s\n", $e->getMessage());
            }
        }
    }
}
?>