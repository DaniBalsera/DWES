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

    // Método para crear un proyecto
    public function createProject($user_id, $titulo, $descripcion, $logoPath, $tecnologias)
    {
        $this->query = "INSERT INTO proyectos (titulo, descripcion, logo, tecnologias, usuarios_id) VALUES (:titulo, :descripcion, :logo, :tecnologias, :usuarios_id)";
        $this->parametros = [
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'logo' => $logoPath,
            'tecnologias' => $tecnologias,
            'usuarios_id' => $user_id
        ];
        $this->execute_single_query();
    }

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

    // Método para crear una red social
    public function createSocial($user_id, $red_social, $url)
    {
        $this->query = "INSERT INTO redes_sociales (redes_sociales, url, usuarios_id) VALUES (:redes_sociales, :url, :usuarios_id)";
        $this->parametros = [
            'redes_sociales' => $red_social,
            'url' => $url,
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
        $this->query = "SELECT titulo AS proyecto_titulo, descripcion AS proyecto_descripcion, logo AS proyecto_logo, tecnologias AS proyecto_tecnologias FROM proyectos WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->get_results_from_query();
        $proyectos = $this->rows;

        // Obtener datos de la tabla redes_sociales
        $this->query = "SELECT redes_sociales, url FROM redes_sociales WHERE usuarios_id = :usuarios_id";
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

    // Método para editar un portfolio
    public function edit($data = array())
    {
        $user_id = $data['user_id'];

        // Actualizar datos en la tabla proyectos
        $this->query = "UPDATE proyectos SET titulo = :titulo, descripcion = :descripcion, logo = :logo, tecnologias = :tecnologias WHERE usuarios_id = :usuarios_id";
        $this->parametros = [
            'titulo' => $data['proyecto_titulo'],
            'descripcion' => $data['proyecto_descripcion'],
            'logo' => $data['proyecto_logo'],
            'tecnologias' => $data['proyecto_tecnologias'],
            'usuarios_id' => $user_id
        ];
        $this->execute_single_query();

        // Actualizar datos en la tabla redes_sociales
        $redes_sociales = [
            ['redes_sociales' => $data['red_social_1'], 'url' => $data['url_1']],
            ['redes_sociales' => $data['red_social_2'], 'url' => $data['url_2']],
            ['redes_sociales' => $data['red_social_3'], 'url' => $data['url_3']]
        ];

        foreach ($redes_sociales as $index => $red_social) {
            if (!empty($red_social['redes_sociales']) && !empty($red_social['url'])) {
                $this->query = "UPDATE redes_sociales SET redes_sociales = :redes_sociales, url = :url WHERE usuarios_id = :usuarios_id AND id = :id";
                $this->parametros = [
                    'redes_sociales' => $red_social['redes_sociales'],
                    'url' => $red_social['url'],
                    'usuarios_id' => $user_id,
                    'id' => $index + 1 // Asumiendo que los IDs de las redes sociales son 1, 2 y 3
                ];
                $this->execute_single_query();
            }
        }

        // Actualizar datos en la tabla skills
        $this->query = "UPDATE skills SET habilidades = :habilidades WHERE usuarios_id = :usuarios_id";
        $this->parametros = [
            'habilidades' => $data['skills'],
            'usuarios_id' => $user_id
        ];
        $this->execute_single_query();

        // Actualizar datos en la tabla trabajos
        foreach ($data['trabajos'] as $index => $trabajo) {
            $this->query = "UPDATE trabajos SET titulo = :titulo, descripcion = :descripcion, fecha_inicio = :fecha_inicio, fecha_final = :fecha_final WHERE usuarios_id = :usuarios_id AND id = :id";
            $this->parametros = [
                'titulo' => $trabajo['titulo'],
                'descripcion' => $trabajo['descripcion'],
                'fecha_inicio' => $trabajo['fecha_inicio'],
                'fecha_final' => $trabajo['fecha_final'],
                'usuarios_id' => $user_id,
                'id' => $index + 1 // Asumiendo que los IDs de los trabajos son 1, 2, 3, etc.
            ];
            $this->execute_single_query();
        }
    }

    // Método para eliminar un portfolio
    public function delete($id = '')
    {
        $user_id = $id;

        $this->query = "DELETE FROM proyectos WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->execute_single_query();

        $this->query = "DELETE FROM redes_sociales WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->execute_single_query();

        $this->query = "DELETE FROM skills WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->execute_single_query();

        $this->query = "DELETE FROM trabajos WHERE usuarios_id = :usuarios_id";
        $this->parametros['usuarios_id'] = $user_id;
        $this->execute_single_query();
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