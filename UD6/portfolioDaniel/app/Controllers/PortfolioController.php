<?php

namespace App\Controllers;

use App\Models\Portfolio;

class PortfolioController extends BaseController
{
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
        session_start();
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
}