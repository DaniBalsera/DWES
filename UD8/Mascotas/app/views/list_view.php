<div id="resultado">
    <?php 
    if (!empty($data) && is_array($data)) {
        foreach ($data as $animal) {
            echo "<div class='animal'>";
            echo "<p>Nombre: " . htmlspecialchars($animal['nombre'] ?? 'Desconocido') . "</p>";
            echo "<p>Raza: " . htmlspecialchars($animal['raza'] ?? 'Desconocida') . "</p>";
            echo "<p>Categoría: " . htmlspecialchars($animal['categoria_id'] ?? 'No especificada') . "</p>";
            if (!empty($animal['foto'])) {
                echo "<img src='" . htmlspecialchars($animal['foto']) . "' alt='Imagen de animal'>";
            }
            echo "</div>";
        }
    } else {      
        echo "<p>No se encontraron animales.</p>";
    }
    ?>
</div>
