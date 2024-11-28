<?php

include("./conf/conf.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Países</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .resultado {
            margin-top: 15px;
        }

        .resultado img {
            max-width: 100px;
            margin-top: 10px;
        }

        .resultado p {
            font-size: 18px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Selecciona un país</h2>
        <form method="POST">
        
            <select name="pais">
                <?php 
                
                foreach($paises as $clave => $valor){
                
                    echo "<option value='$clave'>$clave</option>";
                    
                }

                  
                ?>
            </select>
           
            <?php 
            
            
            
            // Creamos el array con los datos de cada país

            // Verificar si se ha enviado el formulario y se ha seleccionado un país
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['pais'])) {
            $paisSeleccionado = $_POST['pais'];

            // Comprobar si el país seleccionado existe en el array
            if (array_key_exists($paisSeleccionado, $paises)) {
            $capital = $paises[$paisSeleccionado]['capital'];
            $bandera = $paises[$paisSeleccionado]['bandera'];
            // Mostrar el resultado
            echo '<div class="resultado">';
            echo '<p>Capital: ' . htmlspecialchars($capital) . '</p>';
            echo '<img src="' . htmlspecialchars($bandera) . '" alt="Bandera de ' . htmlspecialchars($paisSeleccionado) . '">';
            echo '</div>';
     

        }
        }
            ?>
            <input type="submit" value="Mostrar">
        </form>

  
    </div>
</body>
</html>
