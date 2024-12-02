<?php

/** 
 * Crea un formulario de login que permita al usuario recordar los datos
 * introducidos. Incluye una opción para borrar la información almacenada.
 * 
*/
$formularioProcesado = false;
$datos = [

    'nombre' => '',
    'pass' => '',


];

// Funcion en caso de que se pulse el botón de enviar

if (isset($_POST['enviar'])) {
    $formularioProcesado = true;
}
if($formularioProcesado){
    // Recogemos los datos
    $datos['nombre'] = $_POST['nombre'];
    $datos['pass'] = $_POST['pass'];
    
    // Guardamos el usuario y contraseña en sus cookies correspondientes

    setcookie("usuario", $datos['nombre'], time() + 3600,"/");
    setcookie("contrasena", $datos['pass'], time() + 3600, "/"); // Cookie para la contraseña

    // Mostramos los datos

    echo "<p><strong>Nombre:</strong> {$datos['nombre']}</p>";
    echo "<p><strong>Apellidos:</strong> {$datos['pass']}</p>";
}
else{
    if (isset($_COOKIE['usuario']) && isset($_COOKIE['contrasena'])) {
        $datos['nombre'] = $_COOKIE['usuario']; // Autocompletar con el valor de la cookie
        $datos['pass'] =  $_COOKIE['contrasena'];
    }
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="">
        </head>
        <body>
            <form action="" method="post" enctype="multipart/form-data" novalidate>
           
                <h3>Iniciar sesión</h3>
                <div style="align-content: center">
                    <p> Usuario: <input type="text" name="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>"> </p>
                    <p> Contraseña: <input type="text" name="pass" value="<?php echo htmlspecialchars($datos['pass']); ?>"> </p>
                    <br><br>
                    <input type="submit" name="enviar" value="Iniciar Sesión">
                    <input type="submit" name="borrar" value="Eliminar información almacenada">
                    <?php 
                  
                    if(isset($_POST['borrar'])){
                        setCookie( "usuario", "", time() - 3600,"/");
                        setCookie( "contrasena", "", time() - 3600,"/");
                        
                        unset($_COOKIE["usuario"]);
                        unset($_COOKIE["contrasena"]);
                        $datos['nombre'] = '';
                        $datos['pass'] = '';
                    }
                    ?>
                </div>
            </form>
        </body>

 

            
        </style>
    </html>

