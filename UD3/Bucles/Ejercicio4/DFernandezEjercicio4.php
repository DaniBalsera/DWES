<a href="/DWES/UD3/Bucles/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

<?php

$colores = [

         // Tonos de rojo
    "#FF0000",
    "#FF6347",
    "#FF4500",
    "#DC143C",
    "#B22222",
    "#8B0000",

    // Tonos de azul
    "#0000FF",
    "#1E90FF",
    "#00BFFF",
    "#4682B4",
    "#5F9EA0",
    "#00008B",

    // Tonos de verde
    "#008000",
    "#00FF00",
    "#32CD32",
    "#00FA9A",
    "#228B22",
    "#006400",

    // Tonos de amarillo
    "#FFFF00",
    "#FFD700",
    "#FFA500",
    "#FF8C00",
    "#DAA520",

    // Tonos de púrpura
    "#800080",
    "#8A2BE2",
    "#9370DB",
    "#9400D3",
    "#9932CC",

    // Tonos de rosa
    "#FFC0CB",
    "#FF69B4",
    "#FF1493",
    "#DB7093",

    // Tonos de gris
    "#808080",
    "#A9A9A9",
    "#C0C0C0",
    "#D3D3D3",
    "#696969",
    "#2F4F4F",

    // Otros colores comunes
    "#F5F5DC",
    "#FFE4C4",
    "#D2691E",
    "#A52A2A",
    "#00FFFF",
    "#7FFFD4",
    "#40E0D0",
    "#F0E68C",
    "#800000",
    "#FFFFFF",
    "#000000"
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
