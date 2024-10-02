<?php 
// Obtener la fecha actual
$fechaActual = date("Y-m-d");
$mes = date("m");
$anio = date("Y");
$diaActual = date("d");

// Array de nombres de los meses
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

// Función para determinar si un año es bisiesto
function esBisiesto($anio) {
    return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
}

// Array para almacenar el número de días en cada mes, considerando bisiestos
$diasDelMes = [
    1 => 31,
    2 => (esBisiesto($anio) ? 29 : 28), // Febrero tiene 29 días si es bisiesto
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31
];

// Definir los días festivos en España (en formato 'm-d')
$diasFestivos = [
    "01-01", // Año Nuevo
    "01-06", // Epifanía del Señor (Día de Reyes)
    "05-01", // Día del Trabajador
    "08-15", // Asunción de la Virgen
    "10-12", // Día de la Hispanidad
    "11-01", // Día de Todos los Santos
    "12-06", // Día de la Constitución
    "12-08", // Día de la Inmaculada Concepción
    "12-25"  // Navidad
];

// Generar la tabla
echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";

foreach ($diasDelMes as $mesNumero => $numDias) {
    // Encabezado del mes
    echo "<div style='width: 48%; margin-bottom: 20px;'>";
    echo "<table border='1' cellpadding='5' cellspacing='0' style='text-align: center; width: 100%;'>";
    echo "<tr><th colspan='7'>" . $meses[$mesNumero] . " $anio</th></tr>";
    
    // Cabecera de los días de la semana
    echo "<tr>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mié</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sáb</th>
            <th>Dom</th>
          </tr>";
    
    // Días en el calendario
    $dias = [];
    for ($i = 1; $i <= $numDias; $i++) {
        $dias[] = $i;
    }

    // Calcular el primer día del mes (1 = Lunes, 7 = Domingo)
    $primerDia = date('N', strtotime("$anio-$mesNumero-01")); // 1 (Lunes) a 7 (Domingo)

    // Imprimir espacios vacíos hasta el primer día
    echo "<tr>";
    for ($j = 1; $j < $primerDia; $j++) {
        echo "<td></td>"; // Espacio vacío
    }
    
    // Imprimir los días del mes
    foreach ($dias as $dia) {
        // Comprobar si es el día actual
        $claseDia = "";
        if ($dia == $diaActual && $mesNumero == $mes) {
            $claseDia = "style='background-color: green; color: white;'";
        } 
        
        // Comprobar si es festivo
        if (in_array(sprintf("%02d-%02d", $mesNumero, $dia), $diasFestivos)) {
            $claseDia = "style='background-color: red; color: white;'";
        }
        
        echo "<td $claseDia>" . $dia . "</td>";
        
        // Si es domingo, cerramos la fila
        if (($dia + $primerDia - 1) % 7 == 0) {
            echo "</tr><tr>";
        }
    }

    // Cerrar fila si no terminó en domingo
    echo "</tr>";
    echo "</table></div>"; // Cerrar el div del mes
}

echo "</div>"; // Cerrar el div del contenedor
?>
