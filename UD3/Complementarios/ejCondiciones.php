<?php  

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 * 
 */

 
$formularioProcesado = false;

if (isset($_POST['enviar'])) {
    $formularioProcesado = true;
}

if($formularioProcesado){

    // Ejercicio 1
    $numero = $_POST['number'];

    if (empty($numero) && $numero !== "0") {
        echo "<h2>EJERCICIO 1</h2>";
        echo "<h4>No has introducido ningún valor</h4><br><br><br>";
    } elseif ($numero > 0) {
        echo "<h2>EJERCICIO 1</h2>";
        echo "<h4>El número es positivo</h4><br><br><br>";
    } elseif ($numero < 0) {
        echo "<h2>EJERCICIO 1</h2>";
        echo "<h4>El número es negativo</h4><br><br><br>";
    } else {
        echo "<h2>EJERCICIO 1</h2>";
        echo "<h4>El número es 0</h4><br><br><br>";
    }

    // Ejercicio 2
    $numero1 = $_POST['number1'];
    $numero2 = $_POST['number2'];
    $numero3 = $_POST['number3'];

    if ((empty($numero1) && $numero1 !== "0") || 
        (empty($numero2) && $numero2 !== "0") || 
        (empty($numero3) && $numero3 !== "0")) {
        echo "<h2>EJERCICIO 2</h2>";
        echo "<h4>No has introducido todos los valores</h4><br><br><br>";
    } elseif ($numero1 > $numero2 && $numero1 > $numero3) {
        echo "<h2>EJERCICIO 2</h2>";
        echo "<h4>El número mayor es $numero1</h4><br><br><br>";
    } elseif ($numero2 > $numero1 && $numero2 > $numero3) {
        echo "<h2>EJERCICIO 2</h2>";
        echo "<h4>El número mayor es $numero2</h4><br><br><br>";
    } elseif ($numero3 > $numero1 && $numero3 > $numero2) {
        echo "<h2>EJERCICIO 2</h2>";
        echo "<h4>El número mayor es $numero3</h4><br><br><br>";
    } else {
        echo "<h2>EJERCICIO 2</h2>";
        echo "<h4>No puedes introducir 2 o más números iguales</h4><br><br><br>";
    }

    // Ejercicio 3
    $edad = $_POST['edad'];

    if (empty($edad) && $edad !== "0") {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>No has introducido ningún valor</h4><br><br><br>";
    } elseif ($edad >= 0 && $edad <= 3) {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>Es un bebé</h4><br><br><br>";
    } elseif ($edad >= 4 && $edad <= 13) {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>Es un niño</h4><br><br><br>";
    } elseif ($edad >= 14 && $edad <= 18) {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>Es un adolescente</h4><br><br><br>";
    } elseif ($edad > 18 && $edad < 65) {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>Es un adulto</h4><br><br><br>";
    } elseif ($edad >= 65) {
        echo "<h2>EJERCICIO 3</h2>";
        echo "<h4>Es un anciano</h4><br><br><br>";
    }


    // Ejercicio 4
    
    $dia = $_POST['dia'];

    switch($dia){


        case 1: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Lunes</h4><br><br><br>";
            break;
        case 2: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Martes</h4><br><br><br>";
            break;
        case 3: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Miércoles</h4><br><br><br>";
            break;
        case 4: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Jueves</h4><br><br><br>";
            break;
        case 5: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Viernes</h4><br><br><br>";
            break;
        case 6: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Sábado</h4><br><br><br>";
            break;
        case 7: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Domingo</h4><br><br><br>";
            break;

        default: 

            echo "<h2>EJERCICIO 4</h2>";
            echo "<h4>Día no válido</h4><br><br><br>";
            break;
    }

} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio complementario condiciones</title>
</head>
<body>

<h1>CONDICIONES EN PHP</h1><br>
<form action="" method="post">

<h2>EJERCICIO 1</h2>
<p>Escribe un script que verifique si un número es positivo, negativo o cero.</p>
<label>
    Introduce un número: <input type="number" name="number" id="number"><br><br>
</label>

<h2>EJERCICIO 2</h2>
<p>Dado tres números, determina cuál es el mayor de los tres.</p>
<label>
    Primer número: <input type="number" name="number1" id="number1"><br><br>
    Segundo número: <input type="number" name="number2" id="number2"><br><br>
    Tercer número: <input type="number" name="number3" id="number3"><br><br>
</label>

<h2>EJERCICIO 3</h2>
<p>Escribe un programa que clasifique a una persona según su edad: "niño", "adolescente", "adulto" o "anciano".</p>
<label>
    Edad: <input type="number" name="edad" id="edad"><br><br>
    
</label>


<h2>EJERCICIO 4</h2>
<p>Crea un script que reciba un número entre 1 y 7, y muestre el día de la
semana correspondiente (1 es Lunes, 7 es Domingo).</p>
<label>

    Día: <input type="number" name="dia" id="dia"><br><br>
    
</label>


<input type="submit" value="enviar" name="enviar">
</form>

</body>
</html>

<?php  
}
?>
