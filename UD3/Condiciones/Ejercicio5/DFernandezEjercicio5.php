

<?php

// Creamos una variable llamada privilegios

$Privilegios = "Administrador";


// Creamos dos condiciones en la que se determinará que tipo de usuario estamos usando y según ese usuario
// se mostrará una cantidad de páginas u otras
if ($Privilegios == "usuario") {
  
    echo "El usuario es: $Privilegios";

    echo "<h2>LISTA DE ENLACES</h2>";
    echo "<ul>";
    echo "<li><a href=''>Página 1</a></li>"; 
    echo "<li><a href=''>Página 2</a></li>"; 
    echo "</ul>";

}

else if($Privilegios == "Administrador")
{

    echo "El usuario es: $Privilegios";

    echo "<h2>LISTA DE ENLACES</h2>";
    echo "<ul>";
    echo "<li><a href=''>Página 1</a></li>"; 
    echo "<li><a href=''>Página 2</a></li>"; 
    echo "<li><a href=''>Página 3</a></li>"; 
    echo "<li><a href=''>Página 4</a></li>"; 
    echo "</ul>";
}

echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Condiciones/Ejercicio5/DFernandezEjercicio5.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";

?>

