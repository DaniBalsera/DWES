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

$datos = [

    'nombre' => '',
    'apellidos' => '',
    'telefono' => '',
    'email' => '',
    'ubicacion' => '',
    'sexo' => '',
    'estudios' => '',
    'centro' => '',
    'habilidades' => [],


];

// Funcion en caso de que se pulse el botón de enviar
if (isset($_POST['enviar'])) {
    $formularioProcesado = true;
}

// En caso de que se realiza el procesar formulario se guardan los datos
if ($formularioProcesado) {
    // Recogemos los datos
    $datos['nombre'] = $_POST['nombre'];
    $datos['apellidos'] = $_POST['apellidos'];
    $datos['telefono'] = $_POST['telefono'];
    $datos['email'] = $_POST['email'];
    $datos['ubicacion'] = $_POST['ubicacion'];
    $datos['sexo'] = $_POST['sexo'];
    $datos['estudios'] = $_POST['estudios'];
    $datos['centro'] = $_POST['centro'];
    $datos['habilidades'] = isset($_POST['habilidades']) ? $_POST['habilidades'] : [];
    
    // Procesamiento de la imagen
    $ruta = "uploads/";
    $archivo = $ruta . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $TipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
   
    // Comprobamos que el formato del correo es correcto
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        echo "El formato de correo introducido no es el correcto, vuelva atrás";
    }

    // Mostramos los datos
    else {
        echo "<div class='datos'>";
        echo "<h1>MI CURRICULUM</h1>";
        echo "<div class='imagen-perfil'>";
        echo "<img src='$archivo' alt='Imagen de perfil'>";
        echo "</div>";
        echo "<p><strong>Nombre:</strong> {$datos['nombre']}</p>";
        echo "<p><strong>Apellidos:</strong> {$datos['apellidos']}</p>";
        echo "<p><strong>Teléfono:</strong> {$datos['telefono']}</p>";
        echo "<p><strong>Email:</strong> {$datos['email']}</p>";
        echo "<p><strong>Ubicación:</strong> {$datos['ubicacion']}</p>";
        echo "<p><strong>Sexo:</strong> " . ucfirst($datos['sexo']) . "</p>";
        echo "<p><strong>Últimos estudios:</strong> " . ucfirst($datos['estudios']) . "</p>";
        echo "<p><strong>Último centro de estudios:</strong> {$datos['centro']}</p>";
        
        // Mostrar habilidades seleccionadas
        if (!empty($datos['habilidades'])) {
            echo "<p><strong>Habilidades:</strong></p>";
            echo "<ul class='habilidades-list'>";
            foreach ($datos['habilidades'] as $habilidad) {
                echo "<li>" . ucfirst($habilidad) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se seleccionaron habilidades.</p>";
        }
        echo "</div>";
        echo "</div>";
    }
} else {
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
            <form action="" method="post" enctype="multipart/form-data" novalidate>
                <h1 class="titulo">ÚNETE A NOSOTROS - SPI</h1>
                <h3>Crea tu currículum personalizado</h3>
                <div style="align-content: center">
                    <p> Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>"> </p>
                    <p> Apellidos: <input type="text" name="apellidos" value="<?php echo htmlspecialchars($datos['apellidos']); ?>"> </p>
                    <p> Teléfono: <input type="text" name="telefono" value="<?php echo htmlspecialchars($datos['telefono']); ?>"> </p>
                    <p> Email: <input type="text" name="email" value="<?php echo htmlspecialchars($datos['email']); ?>"> </p>
                    <p> Ubicación: <input type="text" name="ubicacion" value="<?php echo htmlspecialchars($datos['ubicacion']); ?>"> </p>
                    <p> Agrega una imagen tuya: <input type="file" name="foto" id="foto"></p>
                    
                    <p> Sexo: 
                        <input type="radio" name="sexo" value="masculino" <?php if ($datos['sexo'] === 'masculino') echo 'checked'; ?>>        
                        <label for="masculino">Masculino</label> 
                        <input type="radio" name="sexo" value="femenino" <?php if ($datos['sexo'] === 'femenino') echo 'checked'; ?>>
                        <label for="femenino">Femenino</label><br>
                    </p>
                    <p>  
                    Nivel de estudios    
                    <select name="estudios">
                        <option value='secundaria' <?php if ($datos['estudios'] === 'secundaria') echo 'selected'; ?>>Secundaria</option>
                        <option value='fpmedio' <?php if ($datos['estudios'] === 'fpmedio') echo 'selected'; ?>>FP Medio</option>
                        <option value='fsuperior' <?php if ($datos['estudios'] === 'fsuperior') echo 'selected'; ?>>FP Superior</option>
                        <option value='bach' <?php if ($datos['estudios'] === 'bach') echo 'selected'; ?>>Bachillerato</option>
                        <option value='universidad' <?php if ($datos['estudios'] === 'universidad') echo 'selected'; ?>>Carrera universitaria</option> 
                    </select><br>
                    </p>
                    <p> Ultimo centro de estudios: <input type="text" name="centro" value="<?php echo htmlspecialchars($datos['centro']); ?>"> </p>

                    <div class="habilidades">
                        <h3>Habilidades</h3>
                        <div class="habilidades-container">
                            <?php 
                            $habilidadesOpciones = [
                                'python' => 'Python',
                                'javascript' => 'JavaScript',
                                'php' => 'PHP',
                                'csharp' => 'C#',
                                'cplusplus' => 'C++',
                                'html' => 'HTML',
                                'css' => 'CSS',
                                'react' => 'React',
                                'angular' => 'Angular',
                                'vue' => 'Vue.js',
                                'node' => 'Node.js',
                                'mysql' => 'MySQL',
                                'postgresql' => 'PostgreSQL',
                                'mongodb' => 'MongoDB',
                                'git' => 'Git',
                                'docker' => 'Docker',
                                'aws' => 'AWS',
                                'linux' => 'Linux'
                            ];

                            foreach ($habilidadesOpciones as $key => $label) {
                                $checked = in_array($key, $datos['habilidades']) ? 'checked' : '';
                                echo "<label><input type='checkbox' name='habilidades[]' value='$key' $checked> $label</label>";
                            }
                            ?>
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
                margin-top: 20px;
                padding: 10px;
       
            }

            .habilidades h3 {
                margin-bottom: 10px;
            }

            .habilidades-container {
                display: flex;
                flex-wrap: wrap;
                gap: 15px; /* Espaciado entre habilidades */
            }

            .habilidades-container label {
                display: flex;
                align-items: center;
                padding: 5px 10px; /* Espaciado interno */
                cursor: pointer; 

            }

            
        </style>
    </html>
    <?php 
}
?>


