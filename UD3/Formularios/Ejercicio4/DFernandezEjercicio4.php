<?php 

$cantidad = '';
$formularioProcesado = false;
$numerosAleatorios = [];
$suma = 0;
if (isset($_POST['enviar'])){

    $formularioProcesado = true;
    $cantidad = (int)$_POST['cantidad']; 
}

if ($formularioProcesado){




if ($formularioProcesado && $cantidad > 0) {
    // Generar los números aleatorios
    for ($i = 0; $i < $cantidad; $i++) {

        $numero = rand(0, 100);
        $numerosAleatorios[] = $numero;
        $suma += $numero;
    }

    echo "<h1>NÚMEROS SELECCIONADOS</h1>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Número</th></tr>";

    // Mostrar cada número en una fila de la tabla
    foreach ($numerosAleatorios as $numero) {
        echo "<tr><td>$numero</td></tr>";
    }

    echo "</table>";
    echo "<h2>Suma total: $suma</h2>"; // Mostrar la suma total

}
}
else {
    // Mostrar el formulario si no se ha enviado o si la cantidad no es válida
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio suma numeros</title>
</head>
<body>
    <h2>Elige una cantidad de numeros</h2>
<form action="" method="post" enctype="multipart/form-data" novalidate>
<p> Cantidad: <input type="text" name="cantidad" value="<?php echo htmlspecialchars($cantidad); ?>"> </p>
<input type='submit' name='enviar'>
</form>
</body>
</html>

<?php 
} 
?>