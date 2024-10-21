<?php 
/*
<?php
// Inicializacion variables

$usuario = "";
$pass = "";
$formularioProcesado = false;
$recordar = false;
$mensajeError = "";
// Funcion en caso de que se pulse el botón de enviar
if (isset($_POST['enviar'])) {
    $formularioProcesado = true;
}

if ($formularioProcesado){

    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];

// Comprobar que no haya ningun campo vacio

if (($usuario == "") || ($pass == "")){

    $formularioProcesado = false;
    $mensajeError = "Campo requerido";
}

// Comprobar casilla checkbox

if($_POST['recordar']){

    $recordar = true;
    setcookie("cUsuario", $usuario, time()+3600);
    setcookie("cContrasena", $pass, time()+3600);
}else {

    setcookie("cUsuario", $usuario, time()-3600);
    setcookie("cContrasena", $pass, time()-3600);
}

}
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
                <p> Contraseña: <input type="text" name="contraseña" value=" > </p>
                <p> Recordar contraseña <input type="checkbox" name="recordar" ></p>
                <br><br>
                <input type="submit" name="enviar" value="Iniciar sesión">
            </div>
        </form>
    </body>
</html>
<?php 

?>
*/