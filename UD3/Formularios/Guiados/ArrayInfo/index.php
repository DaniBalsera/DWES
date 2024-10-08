<?php
// Array con los datos que queremos pedir al usuario.
// Cada elemento tiene el nombre del campo como clave (por ejemplo, 'Nombre') y el tipo de input como valor ('text', 'email', etc.).
$datos_personales = [
    'Nombre' => 'text',
    'Apellido' => 'text',
    'Edad' => 'number',
    'Email' => 'email',
    'Teléfono' => 'tel'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Definimos la codificación de caracteres a UTF-8, que es estándar para los sitios web modernos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Esto es para que el sitio sea responsivo en dispositivos móviles -->
    <title>Formulario Dinámico</title> <!-- Título de la página -->
</head>
<body>
    <h1>Formulario de Datos Personales</h1> <!-- Título visible para el usuario -->

    <!-- Inicia el formulario, que envía los datos a 'procesar.php' usando el método POST -->
    <form action="array.php" method="POST">
        <!-- El bucle foreach recorre cada par clave/valor del array $datos_personales -->
        <?php foreach ($datos_personales as $campo => $tipo): ?>
            <!-- Para cada entrada del array, generamos un label e input dinámico -->
            <div>
                <label for="<?= $campo; ?>"><?= $campo; ?>:</label> <!-- El label muestra el nombre del campo -->
                <input type="<?= $tipo; ?>" name="<?= strtolower($campo); ?>" id="<?= strtolower($campo); ?>" required> 
                <!-- El input se genera con el tipo especificado (texto, email, número, etc.) y el name es el nombre en minúsculas -->
            </div>
        <?php endforeach; ?> <!-- Cierre del bucle foreach -->
        <br>
        <input type="submit" value="Enviar"> <!-- Botón para enviar el formulario -->
    </form>
</body>
</html>
