<?php

$colores = [
    "#FF5733", "#33FF57", "#3357FF", "#F333FF", "#FF33B5",
    "#33FFF5", "#FFB533", "#B533FF", "#33B5FF", "#5733FF"
];

echo "<table style='border-collapse: collapse; width: 30%;'>"; // Ajuste para el ancho de la tabla
echo "<tr>
        <th style='width: 100px; height: 50px;'>Color</th>
        <th style='width: 100px; height: 50px;'>Hexadecimal</th>
      </tr>";

for ($i = 0; $i < count($colores); $i++) {
    // Generar cada celda con el color correspondiente y su valor hexadecimal
    echo "<tr>";
    
    // Celda con color que redirige al hacer clic
    echo "<td style='width: 40px; height: 100px; background-color: {$colores[$i]}; border: 1px solid #000; cursor: pointer;'
            onclick=\"window.location.href='FondoColor.php?color=" . urlencode($colores[$i]) . "'\"></td>";

    // Celda con el valor hexadecimal
    echo "<td style='border: 1px solid #000; text-align: center; vertical-align: middle;'>{$colores[$i]}</td>";
    
    echo "</tr>";
}

echo "</table>";

echo "<br>";
echo "<tr><td colspan='11'><a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Bucles/Ejercicio4/DFernandezEjercicio4.php' target='_blank'>Enlace a repositorio en github</a></td></tr>";
?>
