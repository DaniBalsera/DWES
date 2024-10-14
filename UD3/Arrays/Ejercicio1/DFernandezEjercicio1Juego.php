<a href="/DWES/UD3/Arrays/Ejercicio1/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>
<?php 

/**

@author Daniel Fernandez Balsera

Actividad 1 Arrays

*/

// Array para el tablero de juego de los barcos

$tablero = array();
// Inicializamos el tablero con ceros
for ($i = 0; $i <10; $i ++)
{
    for ($j = 0; $j<10; $j ++)

    {

        $tablero[$i][$j] = 0;

    }

}


echo "<h1>JUEGO DE LOS BARCOS</h1>";

// Imprimimos el tablero

echo "<table border='1' style='border-collapse: collapse; margin-top: -180px;'>";



for ($i = 0; $i <10; $i ++)
{
echo "<tr>";

    for ($j = 0; $j<10; $j ++)

    {
        if ($i == 0 && $j >0 )
        {

            echo "<td style='width: 30px; height: 30px; text-align: center; background-color: lightblue;' >" . $tablero[0][0] . "</td>"; // Crea una celda

        }
        
        else if ($j == 0 && $i >0)
        {
            echo "<td style='width: 30px; height: 30px; text-align: center; background-color: tan;' >" . $tablero[0][0] . "</td>"; // Crea una celda

        }

        else if ($j == 0 && $i == 0)

        {

            echo "<td style='width: 30px; height: 30px; text-align: center;'>" . $tablero[$i][$j] =  " ". "</td>"; // Crea una celda

        }
        else
        {

            echo "<td style='width: 30px; height: 30px; text-align: center;'>" . $tablero[$i][$j] = "a". "</td>"; // Crea una celda

        }


    }
echo "</tr>";
    echo "<br>";

}

echo "</table>";


?>


