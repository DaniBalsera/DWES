<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    
    foreach ($data['mascotas'] as $mascota) {
        echo "<h1>{$mascota['nombre']}</h1>";
        echo "<p>{$mascota['peso']}</p>";
        echo "<p>{$mascota['raza']}</p>";
    }
    ?>
</body>
</html>