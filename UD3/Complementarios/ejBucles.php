

<!-- @author Daniel Fernández Balsera !-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio complementario bucles</title>
</head>
<body>
<h1>BUCLES EN PHP</h1>

<h2>EJERCICIO 1</h2>
<p>Utiliza un bucle for para imprimir todos los números del 1 al 100.</p><br>
<?php  



for ($i = 1; $i<=100; $i++){

    echo "$i, ";
}

?>

<br><br>

<h2>EJERCICIO 2</h2>
<p>Calcula la suma de los primeros 50 números naturales usando un bucle while.</p><br>

<?php 

$suma = 1;

for ($i = 1; $i<=50; $i++){

    $suma += $i;

    
}

echo "El resultado de la suma de los 50 primeros números naturales: $suma";

?>

<br><br>

<h2>EJERCICIO 3</h2>
<p>Escribe un script que muestre la tabla de multiplicar de un número dado (del 1 al 10).</p><br>

<form action ="" method="post">

<label>


Introduce un número: <input type="number" name="numero" id="numero">
<input type="submit" value="tabla" name="tabla">

</label>

</form>

<?php   

if(isset($_POST['tabla'])){

$numero = $_POST['numero'];

if($numero >=1 && $numero <=10)
{

    
    $mult = 0;
    
    echo "<br><br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Tabla de multiplicar del $numero </th>";
    echo "</tr>";
    for($i=1; $i<=10; $i++){
    
        // Multiplicamos el numero introducido por cada valor del 0 al 1
    
        $mult = $numero * $i;
    
       
        echo "<tr>";
        echo "<td>$numero x $i = $mult</td>";
        echo "</tr>";
        
       
    
    }
    echo "</table>";
}

else {

    echo "<br><br>";
    echo "<h4>Número no válido</h4>";
}

}

?>


<h2>EJERCICIO 4</h2>
<p>Utiliza un bucle para imprimir todos los números pares entre 1 y 100.</p><br>

<?php 

for ($i = 1; $i <= 100; $i++){

    if($i % 2 == 0){

        echo "$i ,";
    }

}


?>

<h2>EJERCICIO 5</h2>
<p>Calcula el factorial de un número dado usando un bucle for.</p><br>


<form action ="" method="post">

<label>


Introduce un número: <input type="number" name="numerof" id="numerof">
<input type="submit" value="calcular factorial" name="calcularf">

</label>

</form>

<br><br>

<?php 

if(isset($_POST['calcularf'])){

$numF = $_POST['numerof'];
$resultado = 1;
for ($i = 1; $i<=$numF; $i++){

 

        $resultado  *= $i;
}

echo "El factorial de $numF es $resultado <br>";



}


?>

</body>

<style>

<style>
        table {
            width: 100%;
            border-collapse: collapse;
         
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

</style>
</html>


