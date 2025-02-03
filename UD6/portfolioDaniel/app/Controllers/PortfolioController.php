<?php

namespace App\Controllers;

use App\Models\Portfolio;

class PortfolioController extends BaseController
{

    /*
    public function showCreateProjectForm()
    {
        $this->renderHTML('../app/view/create_project_view.php');
    }

    public function createProject()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $user_id = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            $tecnologias = trim($_POST['tecnologias']);
            $logo = $_FILES['logo'];

            // Validaciones
            if (empty($titulo)) {
                $errors[] = "El título es obligatorio.";
                $this->renderHTML('../app/view/create_project_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'tecnologias' => $tecnologias]);
                return;
            }
            if (empty($descripcion)) {
                $errors[] = "La descripción es obligatoria.";
                $this->renderHTML('../app/view/create_project_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'tecnologias' => $tecnologias]);
                return;
            }
            if (empty($tecnologias)) {
                $errors[] = "Las tecnologías son obligatorias.";
                $this->renderHTML('../app/view/create_project_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'tecnologias' => $tecnologias]);
                return;
            }
            if ($logo['error'] !== UPLOAD_ERR_OK) {
                $errors[] = "El logo es obligatorio.";
                $this->renderHTML('../app/view/create_project_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'tecnologias' => $tecnologias]);
                return;
            }

            if (empty($errors)) {
                // Manejar la carga del logo
                $logoPath = '/uploads/' . basename($logo['name']);
                $targetFilePath = __DIR__ . '/../../public' . $logoPath;

                if (!move_uploaded_file($logo['tmp_name'], $targetFilePath)) {
                    $errors[] = "Error al subir el logo.";
                    $this->renderHTML('../app/view/create_project_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'tecnologias' => $tecnologias]);
                    return;
                }

                // Guardar el proyecto en la base de datos
                $portfolio = Portfolio::getInstancia();
                $portfolio->createProject($user_id, $titulo, $descripcion, $logoPath, $tecnologias);

                // Redirigir al welcome view
                header('Location: /welcome');
                exit();
            }
        }
    }

    */
    public function showCreateJobForm()
    {
        $this->renderHTML('../app/view/create_job_view.php');
    }

    public function createJob()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $user_id = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            $fecha_inicio = trim($_POST['fecha_inicio']);
            $fecha_final = trim($_POST['fecha_final']);

            // Validaciones
            if (empty($titulo)) {
                $errors[] = "El título es obligatorio.";
                $this->renderHTML('../app/view/create_job_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'fecha_inicio' => $fecha_inicio, 'fecha_final' => $fecha_final]);
                return;
            }
            if (empty($descripcion)) {
                $errors[] = "La descripción es obligatoria.";
                $this->renderHTML('../app/view/create_job_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'fecha_inicio' => $fecha_inicio, 'fecha_final' => $fecha_final]);
                return;
            }
            if (empty($fecha_inicio)) {
                $errors[] = "La fecha de inicio es obligatoria.";
                $this->renderHTML('../app/view/create_job_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'fecha_inicio' => $fecha_inicio, 'fecha_final' => $fecha_final]);
                return;
            }
            if (empty($fecha_final)) {
                $errors[] = "La fecha de finalización es obligatoria.";
                $this->renderHTML('../app/view/create_job_view.php', ['errors' => $errors, 'titulo' => $titulo, 'descripcion' => $descripcion, 'fecha_inicio' => $fecha_inicio, 'fecha_final' => $fecha_final]);
                return;
            }

            // Guardar el trabajo en la base de datos
            $portfolio = Portfolio::getInstancia();
            $portfolio->createJob($user_id, $titulo, $descripcion, $fecha_inicio, $fecha_final);

            // Redirigir al welcome view
            header('Location: /welcome');
            exit();
        }
    }

    public function showCreateSocialForm()
    {
        $this->renderHTML('../app/view/create_social_view.php');
    }
/*
    public function createSocial()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $user_id = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

            $red_social = trim($_POST['red_social']);
            $url = trim($_POST['url']);

            // Validaciones
            if (empty($red_social)) {
                $errors[] = "La red social es obligatoria.";
                $this->renderHTML('../app/view/create_social_view.php', ['errors' => $errors, 'red_social' => $red_social, 'url' => $url]);
                return;
            }
            if (empty($url)) {
                $errors[] = "La URL es obligatoria.";
                $this->renderHTML('../app/view/create_social_view.php', ['errors' => $errors, 'red_social' => $red_social, 'url' => $url]);
                return;
            }

            // Guardar la red social en la base de datos
            $portfolio = Portfolio::getInstancia();
            $portfolio->createSocial($user_id, $red_social, $url);

            // Redirigir al welcome view
            header('Location: /welcome');
            exit();
        }
    }

    public function showCreateSkillForm()
    {
        $this->renderHTML('../app/view/create_skill_view.php');
    }

    public function createSkill()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $user_id = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

            $habilidad = trim($_POST['habilidad']);

            // Validaciones
            if (empty($habilidad)) {
                $errors[] = "La habilidad es obligatoria.";
                $this->renderHTML('../app/view/create_skill_view.php', ['errors' => $errors, 'habilidad' => $habilidad]);
                return;
            }

            // Guardar la habilidad en la base de datos
            $portfolio = Portfolio::getInstancia();
            $portfolio->createSkill($user_id, $habilidad);

            // Redirigir al welcome view
            header('Location: /welcome');
            exit();
        }
    }

    public function showWelcome()
    {

        $user_id = $_SESSION['id']; // Obtenemos el ID del usuario de la sesión

        $portfolio = Portfolio::getInstancia();
        $portfolio_data = $portfolio->getPortfolioByUserId($user_id);

        // Obtener la foto del usuario
        $user = $portfolio->getUserById($user_id);
        $foto = $user['foto'];

        $this->renderHTML('../app/view/welcome_view.php', [
            'portfolio' => $portfolio_data,
            'foto' => $foto
        ]);
    }

    /** FUNCIONES PARA EDITAR */

    /*
    // Editar proyecto
    public function EditProjectForm()
    {
        $data = [];
        $id = $_SESSION['id']; // Id de usuario
        $proyecto = Portfolio::getInstancia();
        $proyectoId = explode('/', $_SERVER['REQUEST_URI'])[3];
        $data['proyecto'] = $proyecto->getProjectById($proyectoId);
        $procesaFormulario = false;
        $errors = []; // Definir el array de errores
        // Obtener datos del formulario con validación básica
        $titulo = "";
        $descripcion = "";
        $tecnologias = "";

        $logo = $_FILES['logo'] ?? null;

        if (!empty($_POST)) {
            $procesaFormulario = true;
            // Validaciones
            if (strlen($titulo) > 128) {
                $errors[] = "El título no puede sobrepasar los 128 caracteres.";
            }else{
                $titulo = trim($_POST['titulo']);
            }

            if (strlen($descripcion) > 256) {
                $errors[] = "La descripción no puede sobrepasar los 256 caracteres.";
            }else{
                $descripcion = trim($_POST['descripcion']);
            }

            if (strlen($tecnologias) > 257) {
                $errors[] = "Las tecnologías no pueden sobrepasar los 257 caracteres.";
            }else{
                $tecnologias = trim($_POST['tecnologias']);
            }

            // Manejo del logo
            if ($logo && $logo['error'] === UPLOAD_ERR_OK) {
                $logoPath = '/uploads/' . basename($logo['name']);
                $targetFilePath = __DIR__ . '/../../public' . $logoPath;

                if (!move_uploaded_file($logo['tmp_name'], $targetFilePath)) {
                    $errors[] = "Error al subir el logo.";
                    $logoPath = $data['proyecto']['logo']; // Mantener el logo anterior en caso de error
                }
            }
             else {
                $logoPath = $data['proyecto']['logo'];
            }


        }

        if ($procesaFormulario) {
       
            // Actualizar el proyecto en la base de datos
            $proyecto->editProject($proyectoId, $titulo, $descripcion, $logoPath, $tecnologias);
            // Redirigir al welcome view
            header('Location: /welcome');
            exit();
        }
        // Si hay errores o no se ha enviado el formulario, renderizar la vista con datos y errores
        $data['errors'] = $errors;
        $this->renderHTML('../app/view/edit_project_view.php', $data);
    }

    */
    // Editar redes sociales

    // public function EditSocialForm()
    // {
    //     $data = [];
    //     $id = $_SESSION['id']; // Id de usuario
    //     $redes = Portfolio::getInstancia();
    //     $redesId = explode('/', $_SERVER['REQUEST_URI'])[3];
    //     $data['redes'] = $redes->getRedSocialById($redesId);
    //     $procesaFormulario = false;
    //     $errors = []; // Definir el array de errores
    //     // Obtener datos del formulario con validación básica
    //     $red_social = "";
    //     $url = "";

    //     if (!empty($_POST)) {
    //         $procesaFormulario = true;
    //         // Validaciones
    //         if (strlen($red_social) > 128) {
    //             $errors[] = "La red social no puede sobrepasar los 128 caracteres.";
    //         }else{
    //             $red_social = trim($_POST['red_social']);
    //         }

    //         if (strlen($url) > 256) {
    //             $errors[] = "La URL no puede sobrepasar los 256 caracteres.";
    //         }else{
    //             $url = trim($_POST['url']);
    //         }

    //     }

    //     if ($procesaFormulario) {
       
    //         // Actualizar la red social en la base de datos
    //         $redes->editSocial($redesId, $red_social, $url);
    //         // Redirigir al welcome view
    //         header('Location: /welcome');
    //         exit();
    //     }
    //     // Si hay errores o no se ha enviado el formulario, renderizar la vista con datos y errores
    //     $data['errors'] = $errors;
    //     $this->renderHTML('../app/view/edit_social_view.php', $data);
    // }

    /** 
    public function editProject()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            $id = $_SESSION['id'];

            
            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            $tecnologias = trim($_POST['tecnologias']);
            $logo = $_FILES['logo'];
            $errors = [];
            $procesaFormulario = true;
            $proyectoActual = [];

            // Obtener el proyecto actual
            $portfolio = Portfolio::getInstancia();
            $proyectoActual = $portfolio->getProjectById($id);

            // Validaciones y asignaciones
            if (empty($titulo)) {
                $titulo = $proyectoActual['titulo'];
            }
            if (empty($descripcion)) {
                $descripcion = $proyectoActual['descripcion'];
            }
            if (empty($tecnologias)) {
                $tecnologias = $proyectoActual['tecnologias'];
            }

            // Manejar la carga del logo si se ha subido uno nuevo
            if ($logo['error'] === UPLOAD_ERR_OK) {
                $logoPath = '/uploads/' . basename($logo['name']);
                $targetFilePath = __DIR__ . '/../../public' . $logoPath;

                if (!move_uploaded_file($logo['tmp_name'], $targetFilePath)) {
                    $errors[] = "Error al subir el logo.";
                    $procesaFormulario = false;
                }
            } else {
                $logoPath = $proyectoActual['logo']; // Mantener el logo actual
                
            }

            if ($procesaFormulario) {
                // Actualizar el proyecto en la base de datos
                $portfolio->editProject($id, $titulo, $descripcion, $logoPath, $tecnologias);
                // Redirigir al welcome view
                var_dump(explode('/', $_SERVER['REQUEST_URI'])[3]);die();
                header('Location: /welcome');
                exit();
            }

            // Si hay errores, volver a mostrar el formulario con los errores
            $data = [
                'errors' => $errors,
                'proyecto' => [
                    'id' => $id,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'tecnologias' => $tecnologias
                ]
            ];
            $this->renderHTML('../app/view/edit_project_view.php', $data);
        }
    }**/
}
