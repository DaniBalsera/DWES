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
        $(document).ready(function() {
            // Mostrar los ejercicios y el título correspondiente a la categoría seleccionada
            $(".ud3-button").click(function() {
                const category = $(this).data("category");

                // Actualizamos el título de la categoría seleccionada
                $("#category-title").text(category); // Cambiar el título dinámicamente

                // Limpiar los botones de ejercicios anteriores
                $("#exercise-buttons").empty();

                // Generar los botones según la categoría seleccionada
                if (category === "Arrays") {
                    // Crear botones para los ejercicios de "Arrays"
                    <?php foreach ($ubicacionesDEWS['UD3']['Arrays']['Ejercicio1'] as $nombreEjercicio => $ruta): ?>
                        $("#exercise-buttons").append(`
                            <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                        `);
                    <?php endforeach; ?>
                    
                    $("#exercise-buttons").append(`
                        <button onclick="window.location.href='<?php echo $ubicacionesDEWS['UD3']['Arrays']['Ejercicio3']; ?>'">Ejercicio 3</button>
                        <button onclick="window.location.href='<?php echo $ubicacionesDEWS['UD3']['Arrays']['Ejercicio4']; ?>'">Ejercicio 4</button>
                        <button onclick="window.location.href='<?php echo $ubicacionesDEWS['UD3']['Arrays']['Ejercicio5']; ?>'">Ejercicio 5</button>
                    `);
                } 
                else if (category === "Bucles") {
                    // Crear botones para los ejercicios de "Bucles"
                    <?php foreach ($ubicacionesDEWS['UD3']['Bucles'] as $nombreEjercicio => $ruta): ?>
                        $("#exercise-buttons").append(`
                            <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                        `);
                    <?php endforeach; ?>
                }
                else if (category === "Condiciones") {
                    // Crear botones para los ejercicios de "Condiciones"
                    <?php foreach ($ubicacionesDEWS['UD3']['Condiciones'] as $nombreEjercicio => $ruta): ?>
                        $("#exercise-buttons").append(`
                            <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                        `);
                    <?php endforeach; ?>
                }
                else if (category === "Formularios") {
                    // Crear botones para los ejercicios de "Formularios"
                    <?php foreach ($ubicacionesDEWS['UD3']['Formularios'] as $nombreEjercicio => $ruta): ?>
                        $("#exercise-buttons").append(`
                            <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                        `);
                    <?php endforeach; ?>
                }
                else if (category === "Complementarios") {
                    // Crear botones para los ejercicios "Complementarios"
                    <?php foreach ($ubicacionesDEWS['UD3']['Complementarios'] as $nombreEjercicio => $ruta): ?>
                        $("#exercise-buttons").append(`
                            <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                        `);
                    <?php endforeach; ?>
                }
                else if (category === "EjerciciosClase") {
                    // Crear botones para los ejercicios de clase
                    <?php foreach ($ubicacionesDEWS['UD3']['EjerciciosClase'] as $categoria => $ejercicios): ?>
                        <?php foreach ($ejercicios as $nombreEjercicio => $ruta): ?>
                            $("#exercise-buttons").append(`
                                <button onclick="window.location.href='<?php echo $ruta; ?>'"><?php echo $nombreEjercicio; ?></button>
                            `);
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                }
                else {
                    $("#exercise-buttons").html("<p>Esta sección aún no está disponible.</p>");
                }
            });
        });
    </script>
</body>
</html>
