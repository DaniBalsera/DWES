<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Models\Portfolio;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Exception;

class ProfileController extends BaseController
{
    public function IndexAction()
    {
        // Crear una instancia de Profile
        $perfil = Profile::getInstancia();

        // Obtener todos los perfiles con la cuenta activa
        $data['profiles'] = $perfil->getActiveProfiles();

        // Manejar la búsqueda
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre']);
            $data['profiles'] = $perfil->get($nombre);
        }

        // Llamar a la función renderHTML
        $this->renderHTML('../app/view/public_view.php', $data);
    }

    public function showRegisterForm()
    {
        $this->renderHTML('../app/view/register_view.php');
    }

    public function register()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $categoria_profesional = trim($_POST['categoria_profesional']);
            $resumen_perfil = trim($_POST['resumen_perfil']);
            $foto = $_FILES['foto'];

            // Validaciones
            if (empty($nombre)) {
                $errors[] = "El nombre es obligatorio.";
            }

            if (empty($apellidos)) {
                $errors[] = "Los apellidos son obligatorios.";
            }

            if (empty($email)) {
                $errors[] = "El email es obligatorio.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "El email no es válido.";
            }

            if (empty($password)) {
                $errors[] = "La contraseña es obligatoria.";
            }

            if (empty($categoria_profesional)) {
                $errors[] = "La categoría profesional es obligatoria.";
            }

            if (empty($resumen_perfil)) {
                $errors[] = "El resumen del perfil es obligatorio.";
            }

            if ($foto['error'] !== UPLOAD_ERR_OK) {
                $errors[] = "La foto es obligatoria.";
            }

            if (empty($errors)) {
                // Crear el directorio uploads si no existe
                $uploadDir = '../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Manejar la subida de la foto
                $fotoPath = $uploadDir . basename($foto['name']);
                if (!move_uploaded_file($foto['tmp_name'], $fotoPath)) {
                    $errors[] = "Error al subir la foto.";
                }

                if (empty($errors)) {
                    // Generar token de seguridad
                    $rb = random_bytes(32);
                    $token = base64_encode($rb);
                    $secureToken = uniqid('', true) . $token;
                    $fecha_creacion_token = date('Y-m-d H:i:s');
                    $cuenta_activa = 0;

                    // Crear instancia de Profile y guardar el usuario
                    $perfil = Profile::getInstancia();
                    $perfil->setNombre($nombre);
                    $perfil->setApellidos($apellidos);
                    $perfil->setEmail($email);
                    $perfil->setPassword(password_hash($password, PASSWORD_BCRYPT));
                    $perfil->setCategoriaProfesional($categoria_profesional);
                    $perfil->setResumenPerfil($resumen_perfil);
                    $perfil->setFoto('/uploads/' . basename($foto['name'])); // Guardar la ruta relativa
                    $perfil->setToken($secureToken);
                    $perfil->setFechaCreacionToken($fecha_creacion_token);
                    $perfil->setCuentaActiva($cuenta_activa);
                    $perfil->set();

                    // Enviar correo electrónico con el enlace de activación
                    //      $this->sendActivationEmail($email, $secureToken);

                    // Redirigir a la vista de bienvenida
                    $_SESSION['id'] = $perfil->getId(); // Usar el método getId() en lugar de acceder directamente a la propiedad
                    $_SESSION['nombre'] = $nombre;
                    header('Location: /welcome');
                    exit();
                }
            }

            // Mostrar errores en la vista
            $data['errors'] = $errors;
            $this->renderHTML('../app/view/register_view.php', $data);
        }
    }

    public function showLoginForm()
    {
        $this->renderHTML('../app/view/login_view.php');
    }

    public function welcomePage()
    {
        $portfolio = null;
    
        if (isset($_SESSION['id'])) {
            $portfolioModel = Portfolio::getInstancia();
            $portfolio = $portfolioModel->getPortfolioByUserId($_SESSION['id']);
        }

    
        $this->renderHTML('../app/view/welcome_view.php', ['portfolio' => $portfolio]);
    }

    // public function welcomePage()
    // {
    //     $data = [];
    
    //     if (isset($_SESSION['id'])) {
    //         $portfolioModel = Portfolio::getInstancia();
    //         $data['proyectos'] = $portfolioModel->getProjectById($_SESSION['id']);
    //         $data['lista'] = $portfolioModel->getPortfolioByUserId($_SESSION['id']);
    //     }

    
    //     $this->renderHTML('../app/view/welcome_view.php', $data);
    // }

    
public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Validar que los campos no estén vacíos
        if (empty($email) || empty($password)) {
            include '../app/view/login_view.php';
            echo "<br>";
            echo "Por favor, complete todos los campos.";
            return;
        }

        // Crear instancia de Profile y verificar el login
        $perfil = Profile::getInstancia();
        $usuario = $perfil->verifyLogin($email, $password);

        if ($usuario) {
            // Iniciar sesión

            $_SESSION['id'] = $usuario['id']; // Usar el ID del usuario desde el array
            $_SESSION['email'] = $email;
            $_SESSION['nombre'] = $usuario['nombre']; // Acceder al nombre del usuario desde el array
            $_SESSION['foto'] = $usuario['foto']; // Acceder a la foto del usuario desde el array
            header('Location: /welcome');
            exit();
        } else {
            include '../app/view/login_view.php';
            echo "<br>";
            echo "Correo electrónico o contraseña incorrectos, o cuenta no activada.";
        }
    }
}

public function logout()
{
    // Inicia la sesión si no está iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Destruye la sesión
    session_destroy();

    // Redirige al formulario de inicio de sesión
    header('Location: /login/user');
    exit();
}
    /**     private function sendActivationEmail($email, $token)
    {
        $adminEmail = 'daniseneca.df@gmail.com';
        $subject = 'Activación de cuenta';
        $message = "Por favor, haz clic en el siguiente enlace para activar tu cuenta: http://portfolio.local/activate?token=$token";

        // Configuración del transporte SMTP
        $transport = Transport::fromDsn('smtp://daniseneca.df@gmail.com:tu_contraseña_de_aplicación@smtp.gmail.com:587');

        // Crear el Mailer usando el transporte SMTP
        $mailer = new Mailer($transport);

        // Crear el correo electrónico
        $emailMessage = (new Email())
            ->from($adminEmail)
            ->to($email)
            ->subject($subject)
            ->html($message);

        // Enviar el correo electrónico
        try {
            $mailer->send($emailMessage);
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$e->getMessage()}";
        }
    }*/
}
