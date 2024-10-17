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
                <option value="">-- Selecciona un país --</option>
                <option value="argentina">Argentina</option>
                <option value="australia">Australia</option>
                <option value="brasil">Brasil</option>
                <option value="canada">Canadá</option>
                <option value="china">China</option>
                <option value="francia">Francia</option>
                <option value="alemania">Alemania</option>
                <option value="india">India</option>
                <option value="indonesia">Indonesia</option>
                <option value="italia">Italia</option>
                <option value="japon">Japón</option>
                <option value="mexico">México</option>
                <option value="rusia">Rusia</option>
                <option value="arabia">Arabia Saudita</option>
                <option value="sudafrica">Sudáfrica</option>
                <option value="coreasur">Corea del Sur</option>
                <option value="reinounido">Reino Unido</option>
                <option value="eeuu">Estados Unidos</option>
            </select>
            <input type="submit" value="Mostrar">
        </form>

        <?php
        // Creamos el array con los datos de cada país
        $paises = array(
            "argentina" => array("capital" => "Buenos Aires", "bandera" => "BanderasPaises/argentina.png"),
            "australia" => array("capital" => "Canberra", "bandera" => "BanderasPaises/australia.png"),
            "brasil" => array("capital" => "Brasilia", "bandera" => "BanderasPaises/brasil.png"),
            "canada" => array("capital" => "Ottawa", "bandera" => "BanderasPaises/canada.png"),
            "china" => array("capital" => "Pekín", "bandera" => "BanderasPaises/china.png"),
            "francia" => array("capital" => "París", "bandera" => "BanderasPaises/francia.png"),
            "alemania" => array("capital" => "Berlín", "bandera" => "BanderasPaises/alemania.png"),
            "india" => array("capital" => "Nueva Delhi", "bandera" => "BanderasPaises/india.png"),
            "indonesia" => array("capital" => "Yakarta", "bandera" => "BanderasPaises/indonesia.png"),
            "italia" => array("capital" => "Roma", "bandera" => "BanderasPaises/italia.png"),
            "japon" => array("capital" => "Tokio", "bandera" => "BanderasPaises/japon.png"),
            "mexico" => array("capital" => "Ciudad de México", "bandera" => "BanderasPaises/mexico.png"),
            "rusia" => array("capital" => "Moscú", "bandera" => "BanderasPaises/rusia.png"),
            "arabia" => array("capital" => "Riad", "bandera" => "BanderasPaises/arabia.png"),
            "sudafrica" => array("capital" => "Pretoria/Ciudad del Cabo", "bandera" => "BanderasPaises/sudafrica.png"),
            "coreasur" => array("capital" => "Seúl", "bandera" => "BanderasPaises/coreasur.png"),
            "reinounido" => array("capital" => "Londres", "bandera" => "BanderasPaises/inglaterra.png"),
            "eeuu" => array("capital" => "Washington D.C.", "bandera" => "BanderasPaises/eeuu.png")
        );

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
    </div>
</body>
</html>
