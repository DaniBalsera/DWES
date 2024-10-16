<a href="/DWES/UD3/Arrays/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
*/

//Declaramos las variables para las fechas

$fechaActual = date("Y-m-d");
$mes = date("m");
$anio = date("Y");
$diaActual = date("d");
//Creamos un array para el nombre de los meses

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


function esBisiesto($anio)
{

    // Si es el año puede ser dividido entre 4 y 100, y da de resto 0, o puede ser dividido entre 400
    // Y da de resto 0, es bisiesto
    return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);

}

// Un array para los dias del mes

$diasDelMes = [

    1 => 31,
    2 => (esBisiesto($anio) ? 29 : 28), // Aqui aplicamos la funcion es bisiesto
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


// Vamos a definir los dias festivos en España, formato: M-D

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

// Definimos los dias festivos de andalucia


$diasFestivosAndalucia = [
    "02-28", // Día de Andalucía
];


// Definimos los dias festivos de cordoba

$diasFestivosCordoba = [
    "05-01", // Día del Trabajador (aplicable en Córdoba)
    "05-05", // Cruces de Mayo
    "08-19", // Feria de Córdoba
    "09-24", // Día de la Virgen de la Fuensanta
];


// Generamos la contenedora flex
echo "<div style='display: flex; flex-wrap: wrap; justify-content: space-between;'>";
// Recorremos el array diasDelMes
foreach($diasDelMes as $mesNumero => $numDias) {
    // Encabezado meses
    echo "<div style='width: 48%; margin-bottom: 20px;'>"; // Ancho reducido al 23% para que quepan varios calendarios por fila
    echo "<table border='1' cellpadding='5' cellspacing='0' style='text-align: center; width: 100%;'>"; // Ajuste en el estilo
    echo "<tr><th colspan='7'>" . $meses[$mesNumero] . " $anio</th></tr>";



//Encabezado días de semana
echo "   <tr>
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
for ($i=1; $i <=$numDias; $i++)
{
    $dias[] = $i;
}

// Calculamos el primer día del mes para asociar cada numero al dia de la semana

$primerDia = date('N', strtotime("$anio-$mesNumero-01"));

// Imprimir espacios vacíos hasta el primer día
 echo "<tr>";
 for ($j = 1; $j < $primerDia; $j++) {
    echo "<td></td>"; // Espacio vacío
}


// Imprimimos los días del mes

foreach ($dias as $dia)
{

    //Comprobamos si es el día actual
    $claseDia = "";
    if ($dia == $diaActual &&  $mesNumero == $mes)
    {
        $claseDia = "style='background-color: green; color: white;'";
    }

    //Comprobamos si es Festivo nacional (rojo)

    $esFestivo = in_array(sprintf("%02d-%02d", $mesNumero, $dia), $diasFestivos);
   

    

    if ($esFestivo) {
        $claseDia = "style='background-color: red; color: white;'";
    }

    // Comprobamos si es festivo andaluz (verde oscuro)

    $esFestivoAndalucia = in_array(sprintf("%02d-%02d", $mesNumero, $dia), $diasFestivosAndalucia);

    if ($esFestivoAndalucia){

        $claseDia = "style='background-color: darkgreen; color: white;'";
    }


     // Comprobamos si es festivo cordobes (verde oscuro)

     $esFestivoCordoba = in_array(sprintf("%02d-%02d", $mesNumero, $dia), $diasFestivosCordoba);

     if ($esFestivoCordoba){
 
         $claseDia = "style='background-color: orange; color: white;'";
     }
 

    // Comprobamos si es domingo (azul)

    $esDomingo = date('N', strtotime("$anio-$mesNumero-$dia")) == 7;

    if ( $esDomingo) {
        $claseDia = "style='background-color: blue; color: white;'";
    }


    // Imprimimos la celda del día con su estilo correspondiente
    echo "<td $claseDia >" . $dia. "</td>";

    // Si es domingo, cerramos la fila

    if (($dia + $primerDia - 1) % 7 == 0) {
        echo "</tr><tr>";
    }
    

   
}
 // Cerramos la fila si no llego domingo
    echo "</tr>";

 // Se cierra la última fila de la tabla, incluso si el último día del mes no cayó en domingo.

    echo "</table></div>"; // Cerrar el div del mes
}

echo "<br>";
echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Bucles/Ejercicio5/DFernandezEjercicio5.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";
?>