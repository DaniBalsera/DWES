<?php

require_once "../app/config/config.php";
require_once "../app/Models/Mascotas.php";

$mascota = Mascotas::getInstancia();
$mascota->get(4);
$mascota->setNombre("JUAN");
$mascota->edit();

// Fetch all mascotas
$mascotas = $mascota->getAll();

echo "<h1>Lista de todos los perros</h1>";
echo "<ul>";
foreach ($mascotas as $mascota) {
    echo "<li>Nombre: " . $mascota->getNombre() . ", Peso: " . $mascota->getPeso() . ", Raza: " . $mascota->getRaza() . "</li>";
}
echo "</ul>";

?>