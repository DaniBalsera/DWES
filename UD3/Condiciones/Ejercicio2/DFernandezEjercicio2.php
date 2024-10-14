<a href="/DWES/UD3/Condiciones/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

<?php

// Primero hay que verificar si un año es bisiesto

function esBisiesto($anio)
    {
        return ($anio % 4 == 0 && $anio % 100 != 0);
    }


$mes = 2;
$anio = 2014;

$dias = 0;

switch($mes){

//MESES CON 31 DIAS
case 1: //Enero
case 3: //Marzo
case 5: //Mayo
case 7: //Julio
case 8: //Agosto
case 10: //Octubre
case 12: //Diciembre
    $dias = 31;
break;

// MESES CON 30 DIAS

case 4: //Abril
case 6: //Junio
case 9: //Septiembre
case 11: //Noviembre
    $dias = 30;
break;

// FEBRERO

case 2:
    if(esBisiesto($anio))
    {

        $dias = 29;
    }
    else{

        $dias = 28;        
    }
break;

default:
    echo"Mes inexistente";
}




// Mostramos los datos



echo "El mes $mes del año $anio tiene $dias días";


echo "<br>";
        echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Condiciones/Ejercicio2/DFernandezEjercicio2.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";
?>

<br><br>
