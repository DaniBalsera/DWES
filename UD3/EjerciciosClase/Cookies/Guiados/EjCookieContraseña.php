<?php 

// Creamos una variable para indicar que el formulario aun no se ha procesado
$formularioProcesado = false;

// Verificamos si ya existen las cookies para rellenar automáticamente los campos
$usuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : '';
$pass = isset($_COOKIE['contraseña']) ? $_COOKIE['contraseña'] : '';

// Funcion en caso de que se pulse el botón de enviar
if (isset($_POST['enviar'])) {
    $formularioProcesado = true;

    // Recogemos los datos del formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $recordar = isset($_POST['recordar']);
    
    // Si la opción "recordar" está marcada, guardamos las cookies
    if ($recordar) {
        setcookie("usuario", $usuario, time() + 3600);
        setcookie("contraseña", $pass, time() + 3600);
    } else {
        // Si no está marcada, eliminamos las cookies existentes
        setcookie("usuario", '', time() - 3600);
        setcookie("contraseña", '', time() - 3600);
    }

    echo "<p><strong>Usuario:</strong> $usuario</p>";
    echo "<p><strong>Contraseña:</strong> $pass</p>"; 
} else {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inicio de Sesión</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="titulo">INICIO DE SESION</h1>
            <div style="align-content: center">
                <p> Usuario: <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" > </p>
                <p> Contraseña: <input type="text" name="contraseña" value="<?php echo htmlspecialchars($pass); ?>" > </p>
                <p> Recordar contraseña <input type="checkbox" name="recordar" <?php echo isset($_COOKIE['usuario']) ? 'checked' : ''; ?>></p>
                <br><br>
                <input type="submit" name="enviar" value="Iniciar sesión">
            </div>
        </form>
    </body>
</html>
<?php 
}
?>
