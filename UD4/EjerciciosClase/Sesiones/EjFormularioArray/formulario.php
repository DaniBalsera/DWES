<?php
session_start();

// Si no existe la variable de sesión, la inicializamos como un array vacío
if (!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = array();
}

$procesaFormulario = true;

// Verificar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];


    if (($nombre === null || $nombre === '') ||  ($email === null || $email === '') || ($telefono === null || $telefono === ''))
    {
        echo "Faltan valores por introducir";
    }

    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "El formato de correo introducido no es el correcto, vuelva atrás";
    }

 

    else {

        $_SESSION["contacts"][]= array(
            "nombre" => $nombre,
            "email" => $email,
            "telefono" => $telefono,
        );
    }
    // Agregar el nuevo contacto como un elemento adicional del array
  
}

$data = $_SESSION["contacts"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>

<h1>Agenda</h1>
<h2>Nuevo contacto</h2>
<form action="" method="post">
    Nombre: <input type="text" name="nombre" id="nombre"> <br><br/>
    Email: <input type="text" name="email" id="email"> <br><br/>
    Teléfono: <input type="text" name="telefono" id="telefono"> <br><br/>
    <input type="submit" value="enviar" name="enviar">
</form>

<h2>Lista de contactos</h2>

<?php
// Mostrar cada contacto en la lista de contactos



foreach ($data as $contacto) {
    // Comprobamos que $contacto es un array antes de acceder a sus elementos
   
        echo $contacto["nombre"] . " - " . $contacto["email"] . " - " . $contacto["telefono"] . "<br>";
        
}
?>

<br/>
<br/>
<a href="cierre.php">Cerrar sesión</a>

</body>
</html>
