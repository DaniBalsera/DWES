<a href="/DWES/UD3/Bucles/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>


<?php 

// Declaración de variables, una que guarde el valor, otra para la suma y otra para contar 3 veces en el bucle
$valor = 0;
$suma = 0;
$contador = 0;

while($contador < 3)
{

    // Metemos una condición para sacar los numeros pares
    if ($valor % 2 == 0)
    {

        
        $suma+=$valor;
        $contador++;

        echo"El valor $contador es $valor <br>";
    }
   
    // Incrementamos el valor para el siguiente if que se repita
    
    $valor ++;
}

echo "La suma es: $suma";

echo "<br><br>";
$url = "https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Bucles/Ejercicio2/DFernandezEjercicio2.php";
echo '<a href="' . $url . '">Enlace a repositorio en github</a>';

?>