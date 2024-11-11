<?php

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

// Cargamos mes y año actual
$mes = date("m");
$anio = date("Y");
$diaActual = date("d");

// Detectar si el año es bisiesto
function esBisiesto($anio) {
    return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
}

// Obtener Jueves y Viernes Santo
function get_easter_datetime($year) {
    $base = new DateTime("$year-03-21");
    $days = easter_days($year);
    return $base->add(new DateInterval("P{$days}D"));
}

function get_holy_thursday_friday($year) {
    $easter = get_easter_datetime($year);
    $thursday = clone $easter;
    $friday = clone $easter;
    $thursday->modify('-3 days');
    $friday->modify('-2 days');
    return ['thursday' => $thursday, 'friday' => $friday];
}

// Array de festivos
$festivos = [
    "Nacionales" => ["01-01", "01-06", "05-01", "08-15", "10-12", "11-01", "12-06", "12-08", "12-25"],
    "Andalucia" => ["02-28"],
    "Cordoba" => ["05-01", "05-05", "08-19", "09-24", "10-24"]
];

// Array de nombres de meses
$meses = [
    1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo",
    6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre",
    11 => "Noviembre", 12 => "Diciembre"
];

// Días por mes
$diasMes = [
    1 => 31, 2 => (esBisiesto($anio) ? 29 : 28), 3 => 31, 4 => 30, 5 => 31,
    6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31
];

// Semana Santa
$semanaSanta = get_holy_thursday_friday($anio);
$juevesSanto = $semanaSanta['thursday']->format('j-n');
$viernesSanto = $semanaSanta['friday']->format('j-n');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anioSeleccionado = isset($_POST['year']) ? (int)$_POST['year'] : $anio;
    $mesSeleccionado = isset($_POST['mes']) && $_POST['mes'] >= 1 && $_POST['mes'] <= 12 ? (int)$_POST['mes'] : $mes;
} else {
    $anioSeleccionado = $anio;
    $mesSeleccionado = $mes;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <style>
        .container { width: 50vw; }
        .calendar { display: inline-block; width: 60%; }
        .legend { display: inline-block; width: 30%; vertical-align: top; padding-left: 20px; }
        .legend-item { margin-bottom: 10px; }
        .legend-box { display: inline-block; width: 15px; height: 15px; margin-right: 5px; vertical-align: middle; }
        .nacional { background-color: red; color: white; }
        .andalucia { background-color: darkgreen; color: white; }
        .cordoba { background-color: orange; color: white; }
        .semana-santa { background-color: purple; color: white; }
        .domingo { background-color: blue; color: white; }
        .hoy { background-color: green; color: white; }
    </style>
</head>
<body>
    <h1>CALENDARIO</h1>

    <form action="" method="post">
        <label>Selecciona el año</label>
        <select name="year" id="year">
            <?php for($year = 1900; $year <= 2150; $year++): ?>
                <option value="<?= $year ?>" <?= $year == $anioSeleccionado ? 'selected' : '' ?>><?= $year ?></option>
            <?php endfor; ?>
        </select>

        <label>Selecciona el mes</label>
        <select name="mes" id="mes">
            <?php foreach($meses as $index => $nombreMes): ?>
                <option value="<?= $index ?>" <?= $index == $mesSeleccionado ? 'selected' : '' ?>><?= $nombreMes ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Mostrar Calendario">
    </form>

    <div class="calendar">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" || !isset($_POST['year'])): ?>
            <br/>
            <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: center;">
                <tr><th colspan="7"><?= $meses[$mesSeleccionado] . " " . $anioSeleccionado ?></th></tr>
                <tr><th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th></tr>
                
                <?php
                    $numDias = $diasMes[$mesSeleccionado];
                    $primerDia = date('N', strtotime("$anioSeleccionado-$mesSeleccionado-01"));
                    echo "<tr>";
                    for ($j = 1; $j < $primerDia; $j++) echo "<td></td>";

                    for ($dia = 1; $dia <= $numDias; $dia++) {
                        $fechaStr = sprintf("%02d-%02d", $mesSeleccionado, $dia);
                        $clase = "";

                        if ($dia == $diaActual && $mes == $mesSeleccionado && $anio == $anioSeleccionado) $clase = "hoy";
                        elseif (in_array($fechaStr, $festivos["Nacionales"])) $clase = "nacional";
                        elseif ($fechaStr == $juevesSanto || $fechaStr == $viernesSanto) $clase = "semana-santa";
                        elseif (in_array($fechaStr, $festivos["Andalucia"])) $clase = "andalucia";
                        elseif (in_array($fechaStr, $festivos["Cordoba"])) $clase = "cordoba";
                        elseif (date('N', strtotime("$anioSeleccionado-$mesSeleccionado-$dia")) == 7) $clase = "domingo";

                        echo "<td class='$clase'>$dia</td>";
                        if (($dia + $primerDia - 1) % 7 == 0) echo "</tr><tr>";
                    }
                    echo "</tr>";
                ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="legend">
        <h3>Leyenda</h3>
        <div class="legend-item"><span class="legend-box nacional"></span>Festivo Nacional</div>
        <div class="legend-item"><span class="legend-box andalucia"></span>Festivo Andalucía</div>
        <div class="legend-item"><span class="legend-box cordoba"></span>Festivo Córdoba</div>
        <div class="legend-item"><span class="legend-box semana-santa"></span>Semana Santa</div>
        <div class="legend-item"><span class="legend-box domingo"></span>Domingo</div>
        <div class="legend-item"><span class="legend-box hoy"></span>Hoy</div>
    </div>

</body>
</html>
