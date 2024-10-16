<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

// Declaramos las variables para las fechas
$fechaActual = date("Y-m-d");
$mes = date("m");
$anio = date("Y");
$diaActual = date("d");

// Creamos un array para el nombre de los meses
$meses = [
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre"
];

// Funcion para detectar el año bisiesto
function esBisiesto($anio) {
    return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
}

// Un array para los días del mes
$diasDelMes = [
    1 => 31,
    2 => (esBisiesto($anio) ? 29 : 28),
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31,
];

// Vamos a definir los días festivos en España, formato: M-D
$diasFestivos = [
    "01-01", // Año nuevo
    "01-06", // Día de reyes
    "05-01", // Día del trabajador
    "08-15", // Asunción de la virgen
    "10-12", // Día de la Hispanidad
    "11-01", // Día de todos los santos
    "12-06", // Día de la constitución
    "12-08", // Día de la Inmaculada Concepción
    "12-25", // Navidad
];

// Definimos los días festivos de Andalucía
$diasFestivosAndalucia = [
    "02-28", // Día de Andalucía
];

// Definimos los días festivos de Córdoba
$diasFestivosCordoba = [
    "05-01", // Día del Trabajador (aplicable en Córdoba)
    "05-05", // Cruces de Mayo
    "08-19", // Feria de Córdoba
    "09-24", // Día de la Virgen de la Fuensanta
    "10-24",
];

// Inicializamos las variables seleccionadas
$anioSeleccionado = $anio;
$mesSeleccionado = $mes;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos el año y el mes seleccionados
    $anioSeleccionado = isset($_POST['year']) ? (int)$_POST['year'] : $anio;
    $mesSeleccionado = isset($_POST['mes']) ? (int)$_POST['mes'] : $mes;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Daniel Fernández</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            background-color: #d44329;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }


        select{

            border-radius: 4px;
            width: 100px;
            height: 25px;
            text-align: center;
            margin: 20px;


        }
    </style>
</head>
<body>

<form method="post">
    <label for="year">Selecciona un año </label>
    <select id="year" name="year">
        <?php
        // Generar opciones para los años desde 1900 hasta 2150
        for ($year = 1900; $year <= 2150; $year++) {
            // Agregar 'selected' si es el año seleccionado
            $selected = ($year == $anioSeleccionado) ? 'selected' : '';
            echo "<option value='$year' $selected>$year</option>";
        }
        ?>
    </select>

    <label for="mes">Mes </label>
    <select id="mes" name="mes">
        <?php
        // Generar opciones para los meses
        foreach ($meses as $clave => $nombreMes) {
            // Agregar 'selected' si es el mes seleccionado
            $selected = ($clave == $mesSeleccionado) ? 'selected' : '';
            echo "<option value='$clave' $selected>$nombreMes</option>";
        }
        ?>
    </select>

    <input type="submit" value="Mostrar Calendario">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar mes seleccionado
    if ($mesSeleccionado < 1 || $mesSeleccionado > 12) {
        echo "Mes no válido.";
        exit;
    }

    // Validar año seleccionado
    if ($anioSeleccionado < 1900 || $anioSeleccionado > 2150) {
        echo "Año no válido.";
        exit;
    }

    // Generamos la contenedora flex
    echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";

    $numDias = $diasDelMes[$mesSeleccionado]; 

    // Encabezado mes
    echo "<div style='width: 48%; margin-bottom: 20px;'>";
    echo "<table class='container' border='1' cellpadding='5' cellspacing='0' style='text-align: center; width: 100%;'>";
    echo "<tr><th colspan='7'>" . $meses[$mesSeleccionado] . " $anioSeleccionado</th></tr>";

    // Encabezado días de semana
    echo "<tr>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mié</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sáb</th>
            <th>Dom</th>
          </tr>";

    // Recorremos los días en el calendario
    $dias = [];
    for ($i = 1; $i <= $numDias; $i++) {
        $dias[] = $i;
    }

    // Calculamos el primer día del mes para asociar cada número al día de la semana
    $primerDia = date('N', strtotime("$anioSeleccionado-$mesSeleccionado-01"));

    // Imprimir espacios vacíos hasta el primer día
    echo "<tr>";
    for ($j = 1; $j < $primerDia; $j++) {
        echo "<td></td>"; // Espacio vacío
    }

    // Imprimimos los días del mes
    foreach ($dias as $dia) {
        // Comprobamos si es el día actual
        $claseDia = "";
        if ($dia == $diaActual && $mesSeleccionado == $mes) {
            $claseDia = "style='background-color: green; color: white;'";
        }

        // Comprobamos si es Festivo nacional (rojo)
        $esFestivo = in_array(sprintf("%02d-%02d", $mesSeleccionado, $dia), $diasFestivos);
        if ($esFestivo) {
            $claseDia = "style='background-color: red; color: white;'";
        }

        // Comprobamos si es festivo andaluz (verde oscuro)
        $esFestivoAndalucia = in_array(sprintf("%02d-%02d", $mesSeleccionado, $dia), $diasFestivosAndalucia);
        if ($esFestivoAndalucia) {
            $claseDia = "style='background-color: darkgreen; color: white;'";
        }

        // Comprobamos si es festivo cordobés (naranja)
        $esFestivoCordoba = in_array(sprintf("%02d-%02d", $mesSeleccionado, $dia), $diasFestivosCordoba);
        if ($esFestivoCordoba) {
            $claseDia = "style='background-color: orange; color: white;'";
        }

        // Comprobamos si es domingo (azul)
        $esDomingo = date('N', strtotime("$anioSeleccionado-$mesSeleccionado-$dia")) == 7;
        if ($esDomingo) {
            $claseDia = "style='background-color: blue; color: white;'";
        }

        // Imprimimos la celda del día con su estilo correspondiente
        echo "<td $claseDia >" . $dia . "</td>";

        // Si es domingo, cerramos la fila
        if (($dia + $primerDia - 1) % 7 == 0) {
            echo "</tr><tr>";
        }
    }

    // Cerramos la fila si no llegó domingo
    echo "</tr>";
    echo "</table></div>"; // Cerrar el div del mes

    echo "<br>";
}
?>

</body>
</html>
