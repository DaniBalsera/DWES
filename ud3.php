<?php
include "conf/conf.php";  // Incluye las configuraciones necesarias
include "header.php";      // Incluye el encabezado de la página
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3 - Daniel Fernández Balsera</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1 id="miNombre">Unidad Didáctica 3 - UD3</h1>
    </header>

    <section class="ud3-section">
        <!-- Título de la categoría seleccionada -->
        <div id="category-title" style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color:white">
            <!-- El título de la categoría se actualizará aquí dinámicamente -->
        </div>
        
        <div class="buttons">
            <!-- Botones de las diferentes categorías -->
            <button class="ud3-button" data-category="Arrays">Arrays</button>
            <button class="ud3-button" data-category="Bucles">Bucles</button>
            <button class="ud3-button" data-category="Condiciones">Condiciones</button>
            <button class="ud3-button" data-category="Formularios">Formularios</button>
            <button class="ud3-button" data-category="Complementarios">Complementarios</button>
            <button class="ud3-button" data-category="EjerciciosClase">Ejercicios de Clase</button>
        </div>

        <div id="exercise-buttons" class="exercise-buttons">
            <!-- Aquí se cargarán los botones de ejercicios para cada categoría -->
        </div>
    </section>

    <script>
        // Pasar los datos de los ejercicios de PHP a JavaScript
        var ejerciciosData = <?php echo json_encode($ubicacionesDEWS['UD3']); ?>;

        $(document).ready(function() {
            // Mostrar los ejercicios y el título correspondiente a la categoría seleccionada
            $(".ud3-button").click(function() {
                const category = $(this).data("category");

                // Actualizamos el título de la categoría seleccionada
                $("#category-title").text(category); // Cambiar el título dinámicamente

                // Limpiar los botones de ejercicios anteriores
                $("#exercise-buttons").empty();

                // Función para agregar botones
                function addButtons(exercises) {
                    $.each(exercises, function(key, value) {
                        if (typeof value === "object") {
                            // Si es un objeto (subcategoría), recorrerlo
                            addButtons(value); // Recursividad para manejar subcategorías
                        } else {
                            // Si es una ruta, generar un botón
                            $("#exercise-buttons").append(`
                                <button onclick="window.location.href='${value}'">${key}</button>
                            `);
                        }
                    });
                }

                // Generar los botones según la categoría seleccionada
                if (category in ejerciciosData) {
                    const exercises = ejerciciosData[category];
                    addButtons(exercises); // Llamar a la función para agregar los botones
                } else {
                    $("#exercise-buttons").html("<p>Esta sección aún no está disponible.</p>");
                }
            });
        });
    </script>
</body>
</html>
