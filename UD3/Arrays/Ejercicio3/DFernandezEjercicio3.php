<?php
/**
 * 
 * Autor: Daniel Fernández Balsera
 * 
 */

// Arrays de nombres y apellidos
$nombres = array("Raúl", "Álvaro", "Miguel", "Alejandro", "Mostafa", "Alejandro", "Juan Diego", "Marlon Jafet", "Ángel", "Alejandro", "Daniel", "Jesús", "Jesús", "Manuel", "Víctor", "Lucía", "Adrián", "Enrique", "Oscar", "José María", "Pablo", "Héctor", "Luis", "Carlos", "Javier", "Alejandro", "Luís Miguel");
$apellidos1 = array("Bermúdez", "Cañas", "Carmona", "Carrasco", "Cherif", "Coronado", "Delgado", "Escoto", "Fernández", "Fernández", "Fernández", "Ferrer", "Frías", "Galán", "García", "García", "González", "Mariño", "Martín-Castaño", "Mayén", "Mérida", "Mora", "Pérez", "Romero", "Ruiz", "Vaquero", "Villén");
$apellidos2 = array("González", "González", "Cicchetti", "Castellano", "Mouaki Almabouada", "Ortega", "Morente", "García", "Ariza", "Arrayás", "Balsera", "López", "Rojas", "Navas", "Báez", "Díaz", "Martínez", "Jiménez", "Carrillo", "Pérez", "Velasco", "Sánchez", "Cantarero", "Romero", "Molero", "Abad", "Moyano");

// Número de alumnos a generar
$numAlumnos = 27;

// Generar alumnos aleatorios
$alumnos = array();
for ($i = 1; $i <= $numAlumnos; $i++) {
    $nombre = $nombres[array_rand($nombres)];
    $apellido1 = $apellidos1[array_rand($apellidos1)];
    $apellido2 = $apellidos2[array_rand($apellidos2)];
    $nombreCompleto = "$apellido1 $apellido2, $nombre";
    $alumnos["alumno$i"] = array(
        "Nombre" => $nombreCompleto,
        "Imagen" => array("imagenAlumno" => "alumno.png"),
    );
}

// Seleccionar un alumno aleatorio si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumnoSeleccionado = array_rand($alumnos);
    $nombreAlumno = $alumnos[$alumnoSeleccionado]['Nombre'];
    $imagenAlumno = $alumnos[$alumnoSeleccionado]['Imagen']['imagenAlumno'];
} else {
    $nombreAlumno = "";
    $imagenAlumno = "";
}
?>

<!--Creamos un apartado HTML5 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección Alumnos Daniel Fernández</title>
</head>
<body>
   <div class="container">
   <h1>Alumno Seleccionado</h1>
    <form method="POST">
        <button type="submit">Generar Alumno Aleatorio</button>
    </form>
    <?php if ($nombreAlumno): ?>
    <div class="result">
        <strong>Alumno:</strong><br>
        <?php echo htmlspecialchars($nombreAlumno); ?><br><br>
        <img src="<?php echo htmlspecialchars($imagenAlumno)?>" alt="">
    </div>
    <?php endif; ?>
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4a8fc5;
        }
        h1{
            font-family:  Verdana, sans-serif;
            font-size: 30px;
        }
        .container {
            background-color: #e4f877;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        button {
            width: 100%;
            padding: 20px;
            background-color: #4a8fc5;
            margin-bottom: 20px;
            color: white;
            font-size: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 4px;
        }
    </style>
</body>
</html>