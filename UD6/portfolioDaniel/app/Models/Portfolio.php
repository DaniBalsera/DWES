<?php

namespace App\Models;

require_once('DBAbstractModel.php');

class Portfolio extends DBAbstractModel
{
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
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    private $proyecto_titulo;
    private $proyecto_descripcion;
    private $proyecto_logo;
    private $proyecto_tecnologias;
    private $red_social;
    private $url;
    private $skills;
    private $trabajos = [];

    // Métodos para establecer los valores de las propiedades
    public function setProyectoTitulo($titulo)
    {
        $this->proyecto_titulo = $titulo;
    }

    public function setProyectoDescripcion($descripcion)
    {
        $this->proyecto_descripcion = $descripcion;
    }

    public function setProyectoLogo($logo)
    {
        $this->proyecto_logo = $logo;
    }

    public function setProyectoTecnologias($tecnologias)
    {
        $this->proyecto_tecnologias = $tecnologias;
    }

    public function setRedSocial($red_social)
    {
        $this->red_social = $red_social;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function setTrabajos($trabajos)
    {
        $this->trabajos = $trabajos;
    }

 
    public function edit(){}
    public function delete(){}
    

    // Método para crear un trabajo
    public function createJob($user_id, $titulo, $descripcion, $fecha_inicio, $fecha_final)
    {
        $this->query = "INSERT INTO trabajos (titulo, descripcion, fecha_inicio, fecha_final, usuarios_id) VALUES (:titulo, :descripcion, :fecha_inicio, :fecha_final, :usuarios_id)";
        $this->parametros = [
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_final' => $fecha_final,
            'usuarios_id' => $user_id
        ];
        $this->execute_single_query();
    }

   

    // Método para crear una habilidad
    public function createSkill($user_id, $habilidades)
    {
        $this->query = "INSERT INTO skills (habilidades, usuarios_id) VALUES (:habilidades, :usuarios_id)";
        $this->parametros = [
            'habilidades' => $habilidades,
            'usuarios_id' => $user_id
        ];
        $this->execute_single_query();
    }

    // Método para obtener el portfolio por ID de usuario
    public function getPortfolioByUserId($user_id)
    {


        // Obtener datos de la tabla proyectos
        $this->query = "SELECT id AS id_p, titulo AS proyecto_titulo, descripcion AS proyecto_descripcion, logo AS proyecto_logo, tecnologias AS proyecto_tecnologias FROM proyectos WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->get_results_from_query();
        $proyectos = $this->rows;

        // Obtener datos de la tabla redes_sociales (datos: id, redes_sociales, url)
        $this->query = "SELECT id AS id_s, redes_sociales, url FROM redes_sociales WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->get_results_from_query();
        $redes_sociales = $this->rows;

        // Obtener datos de la tabla skills
        $this->query = "SELECT habilidades FROM skills WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->get_results_from_query();
        $skills = $this->rows;

        // Obtener datos de la tabla trabajos
        $this->query = "SELECT titulo AS trabajo_titulo, descripcion AS trabajo_descripcion, fecha_inicio AS trabajo_fecha_inicio, fecha_final AS trabajo_fecha_final FROM trabajos WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->get_results_from_query();
        $trabajos = $this->rows;

        return [
            'proyectos' => $proyectos,
            'redes_sociales' => $redes_sociales,
            'skills' => $skills,
            'trabajos' => $trabajos
        ];
    }

    // Método para obtener un portfolio por ID
    public function get($id = '')
    {
        $this->query = "SELECT * FROM portfolios WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    // Método para establecer los valores de las propiedades
    public function set($data = array())
    {
        foreach ($data as $campo => $valor) {
            $this->$campo = $valor;
        }
    }

    public function getProjectById($id)
    {
        $this->query = "SELECT * FROM proyectos WHERE id = :id OR usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $id;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getRedSocialById($id)
    {
        $this->query = "SELECT * FROM redes_sociales WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }


    // Método para obtener el usuario por ID
    public function getUserById($user_id)
    {
        $this->query = "SELECT foto FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $user_id;
        $this->get_results_from_query();
        return $this->rows[0];
    }
}
