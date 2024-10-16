<?php

/**

@author Daniel Fernández Balsera

Crear formulario currículum, y debe incluir:

    Primera parte

    - Campos de texto para Nombre, Apellidos, teléfono, correo electrónico, ubicación.
    - Casilla de verificación para sexo.
    - Lista desplegable para ultimos estudios.
    - Botón para enviar la información.
    - Selección múltiple para habilidades

*/

// Creamos una variable para indicar que el formulario aun no se ha procesado
$formularioProcesado = false;

// Funcion en caso de que se pulse el botón de enviar
if (isset($_POST['enviar'])) {
    $formularioProcesado = true;
}

// En caso de que se realiza el procesar formulario se guardan los datos
if ($formularioProcesado) {
    // Recogemos los datos
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $ubicacion = $_POST['ubicacion'];
    $sexo = $_POST['sexo'];
    $estudios = $_POST['estudios'];
    $centro = $_POST['centro'];
    
    // Cambiamos para que habilidades sea un arreglo
    $habilidades = isset($_POST['habilidades']) ? $_POST['habilidades'] : [];

   // Procesamiento de la imagen
   $ruta = "uploads/";
   $archivo = $ruta . basename($_FILES["foto"]["name"]);
   $uploadOk = 1;
   $TipoArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
   
    // Comprobamos que el formato del correo es correcto
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato de correo introducido, no es el correcto, vuelva atrás";
    }
    // Mostramos los datos
    else {
        echo "<div class='curriculum'>";
        echo "<h1>MI CURRICULUM</h1>";
        echo "<div class='imagen-perfil'>";
        echo "<img src='$archivo' alt='Imagen de perfil'>";
        echo "</div>";
        echo "<div class='datos'>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Apellidos:</strong> $apellidos</p>";
        echo "<p><strong>Teléfono:</strong> $telefono</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Ubicación:</strong> $ubicacion</p>";
        echo "<p><strong>Sexo:</strong> " . ucfirst($sexo) . "</p>";
        echo "<p><strong>Últimos estudios:</strong> " . ucfirst($estudios) . "</p>";
        echo "<p><strong>Último centro de estudios:</strong> $centro</p>";
        
        // Mostrar habilidades seleccionadas
        if (!empty($habilidades)) {
            echo "<p><strong>Habilidades:</strong></p>";
            echo "<ul class='habilidades-list'>";
            foreach ($habilidades as $habilidad) {
                echo "<li>" . ucfirst($habilidad) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se seleccionaron habilidades.</p>";
        }
        echo "</div>";
        echo "</div>";
    }
}  else {
    // En caso de que no funcione todo lo anterior, se sigue mostrando el formulario
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
            <form action="" method="post"  enctype="multipart/form-data" novalidate>
                <h1 class="titulo">ÚNETE A NOSOTROS - SPI</h1>
                <h3>Crea tu currículum personalizado</h3>
                <div style="align-content: center">
                    <p> Nombre: <input type="text" name="nombre" id=""> </p>
                    <p> Apellidos: <input type="text" name="apellidos" id=""> </p>
                    <p> Teléfono: <input type="text" name="telefono" id=""> </p>
                    <p> Email: <input type="text" name="email" id=""> </p>
                    <p> Ubicación: <input type="text" name="ubicacion" id=""> </p>
                    <p> Agrega una imagen tuya: <input type="file" name="foto" id="foto"></p>
                    
                    <p> Sexo: 
                        <input type="radio" name="sexo" value="masculino">        
                        <label for="masculino">Masculino</label> 
                        <input type="radio" name="sexo" value="femenino">
                        <label for="femenino">Femenino</label><br>
                    </p>
                    <p>  
                    Nivel de estudios    
                    <select name="estudios">
                        <option value='secundaria'>Secundaria</option>
                        <option value='fpmedio'>FP Medio</option>
                        <option value='fsuperior'>FP Superior</option>
                        <option value='bach'>Bachillerato</option>
                        <option value='universidad'>Carrera universitaria</option> 
                    </select><br>
                    </p>
                    <p> Ultimo centro de estudios: <input type="text" name="centro" id=""> </p>

                    <div class="habilidades">
                        <h3>Habilidades</h3>
                        <div>
                            <h4>Habilidades de programación</h4>
                            <label><input type="checkbox" name="habilidades[]" value="python"> Python</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="javascript"> JavaScript</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="php"> PHP</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="csharp"> C#</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="cplusplus"> C++</label><br>
                        </div>

                        <div>
                            <h4>Habilidades de desarrollo web</h4>
                            <label><input type="checkbox" name="habilidades[]" value="html"> HTML</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="css"> CSS</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="react"> React</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="angular"> Angular</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="vue"> Vue.js</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="node"> Node.js</label><br>
                        </div>

                        <div>
                            <h4>Habilidades de bases de datos</h4>
                            <label><input type="checkbox" name="habilidades[]" value="mysql"> MySQL</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="postgresql"> PostgreSQL</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="mongodb"> MongoDB</label><br>
                        </div>

                        <div>
                            <h4>Habilidades de sistemas</h4>
                            <label><input type="checkbox" name="habilidades[]" value="git"> Git</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="docker"> Docker</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="aws"> AWS</label><br>
                            <label><input type="checkbox" name="habilidades[]" value="linux"> Linux</label><br>
                        </div> 
                    </div>

                    <br><br>
                    <input type="submit" name="enviar" value="Enviar CV">
                    <input type="reset" value="Resetear">
                </div>
            </form>
        </body>

        <style>
        .habilidades {
            display: flex;
            flex-wrap: wrap; 
            justify-content: space-between; 
            gap: 20px; 
        }

        .habilidades div {
            flex: 1 1 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-height: 150px; 
            box-sizing: border-box; 
        }

        

        </style>
    </html>
    <?php 
}
?>
