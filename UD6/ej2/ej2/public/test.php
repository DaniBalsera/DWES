<?php

require_once "../app/config/config.php";
require_once "../app/Models/Mascotas.php";

// Creamos mascotas sin utilizar el patrón de diseño
$mascota1 = new Mascotas();
$mascota2 = new Mascotas();

// Se han creado dos objetos


// Creamos mascotas utilizando el patron de diseño

$mascota3 = Mascotas::getInstancia();
$mascota4 = Mascotas::getInstancia();

// Se ha creado un solo objeto

$mascota = Mascotas::getInstancia();

$mascota->setNombre("Firulai");
$mascota->setPeso(400);
$mascota->setRaza("San Bernardo");

$mascota->set();

// Obtener y mostrar la lista de todos los perros
$mascotas = Mascotas::getAll();

echo "<h1>Lista de todos los perros</h1>";
echo "<ul>";
foreach ($mascotas as $mascota) {
    echo "<li>Nombre: " . $mascota->getNombre() . ", Peso: " . $mascota->getPeso() . ", Raza: " . $mascota->getRaza() . "</li>";
}
echo "</ul>";

?>