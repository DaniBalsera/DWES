<?php 
// Metemos un color por defecto, en este caso el blanco
$color = isset($_GET['color']) ? $_GET['color'] : "#FFFFFF"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Seleccionado</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: <?php echo htmlspecialchars($color); ?>; /* Cambia el color de fondo */
            color: #FFF; /* Texto blanco para mejor visibilidad */
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Color Seleccionado</h1>


</body>
</html>
