<a href="/DWES/UD3/Arrays/Ejercicio1/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

<?php 

/**
 * 
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 * 
 */

// Array Notas alumnos DAW

$notas = array(

"Bermúdez González, Raúl" => 10, 
"Cañas González, Álvaro" => 7, 
"Carmona Cicchetti, Miguel" =>8, 
"Carrasco Castellano, Alejandro" =>6,
"Cherif Mouaki Almabouada, Mostafa" =>5,
"Coronado Ortega, Alejandro" =>7, 
"Delgado Morente, Juan Diego" => 8, 
"Escoto García, Marlon Jafet" => 9, 
"Fernández Ariza, Ángel" => 8, 
"Fernández Arrayás, Alejandro" => 6, 
"Fernández Balsera, Daniel" => 8, 
"Ferrer López, Jesús" => 10, 
"Frías Rojas, Jesús" =>5, 
"Galán Navas, Manuel" => 6, 
"García Báez, Víctor" =>7, 
"García Díaz, Lucía" =>8, 
"González Martínez, Adrián" =>10, 
"Mariño Jiménez, Enrique" =>8, 
"Martín-Castaño Carrillo, Oscar" =>9, 
"Mayén Pérez, José María" =>4, 
"Mérida Velasco, Pablo" => 6, 
"Mora Sánchez, Héctor" =>8, 
"Pérez Cantarero, Luis" =>7, 
"Romero Romero, Carlos" =>9, 
"Ruiz Molero, Javier" => 7, 
"Vaquero Abad, Alejandro" => 9, 
"Villén Moyano, Luís Miguel" =>5

);

echo "<table border='1'>";
echo "<tr><th>NOTAS DE LOS ALUMNOS EN DESARROLLO WEB EN ENTORNO DE SERVIDOR </th></tr>";
echo "<th>Alumnos</th><th>Notas</th>";
foreach ($notas as $alumno => $resultado)
{


echo "<tr>";
echo "<td>$alumno</td>";
echo "<td>$resultado</td>";
echo "</tr>";
}
?>