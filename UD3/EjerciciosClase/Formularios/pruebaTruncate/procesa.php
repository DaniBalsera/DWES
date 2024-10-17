<?php 



if(!isset($_POST["enviar"])){

    header("location:index.php");


}



echo "Datos de formulario: ";

foreach($_POST as $clave => $valor){
    
    // Ignoramos el valor del botón enviar
    if ($clave == "enviar") {
        continue; // Saltamos esta iteración
    }
    // Realizamos una condición para validar si el formato introducido es correcto (!filter_var($valor, FILTER_VALIDATE_EMAIL))
    if ($clave == "email" && !filter_var($valor, FILTER_VALIDATE_EMAIL)){

        echo "El formato introducido no es correcto";
    }
    echo "<br><br/>";
    echo $valor;
    echo "<br/>";

} 



?>