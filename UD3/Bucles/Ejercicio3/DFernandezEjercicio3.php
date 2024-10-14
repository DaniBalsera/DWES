<a href="/DWES/UD3/Bucles/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

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
echo "<br>";
echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Bucles/Ejercicio3/DFernandezEjercicio3.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";

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


