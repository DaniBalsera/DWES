<?php 

//Definimos el arra
$tabla = [];

for ($i = 1; $i<=10; $i++)
{
    for ($j = 1; $j<=10; $j++)
    {
        $tabla[$i][$j] = $i * $j;
    }
}

// Creamos la tabla
echo "<table>";


//Imprimimos la primera fila con los numeros
echo "<tr><th></th>";

for ($numero = 1; $numero <=10; $numero++)
{
    echo "<th>$numero</th>";
}


// Imprimimos el resto de la tabla

foreach ($tabla as $fila => $valores)
{
    echo "<tr><th>$fila</th>";

    // Imprimimos cada celda

    foreach ($valores as $valor)

    {
        echo"<td>$valor</td>";
    }
    
    echo "</tr>";
}

echo "</table>";


echo "<style>



table{

width: 60%;
border-collapse: collapse;
font-sizer: 30px;
text-align: center;

}

th, td{

border: 1px solid #000;


}

th {

    background-color: beige;
}
</style>";
?>