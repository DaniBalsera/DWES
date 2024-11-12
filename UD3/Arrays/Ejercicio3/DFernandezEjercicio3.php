

<?php
/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 */


// He creado un array con una foto por defecto para todos los alumnos y en el futuro cuando tenga una foto de cada uno, ir añadiendola:

$fotoAlumno = array(

    "imagenAlumno" => "alumno.png",
);

// Recorremos el array de alumnos


$alumnos = array(
    "alumno1" => array(
        "Nombre" => "Bermúdez González, Raúl",
        "Imagen" => $fotoAlumno,
    ),
    "alumno2" => array(
        "Nombre" => "Cañas González, Álvaro",
        "Imagen" => $fotoAlumno,
    ),
    "alumno3" => array(
        "Nombre" => "Carmona Cicchetti, Miguel",
        "Imagen" => $fotoAlumno,
    ),
    "alumno4" => array(
        "Nombre" => "Carrasco Castellano, Alejandro",
        "Imagen" => $fotoAlumno,
    ),
    "alumno5" => array(
        "Nombre" => "Cherif Mouaki Almabouada, Mostafa",
        "Imagen" => $fotoAlumno,
    ),
    "alumno6" => array(
        "Nombre" => "Coronado Ortega, Alejandro",
        "Imagen" => $fotoAlumno,
    ),
    "alumno7" => array(
        "Nombre" => "Delgado Morente, Juan Diego",
        "Imagen" => $fotoAlumno,
    ),
    "alumno8" => array(
        "Nombre" => "Escoto García, Marlon Jafet",
        "Imagen" => $fotoAlumno,
    ),
    "alumno9" => array(
        "Nombre" => "Fernández Ariza, Ángel",
        "Imagen" => $fotoAlumno,
    ),
    "alumno10" => array(
        "Nombre" => "Fernández Arrayás, Alejandro",
        "Imagen" => $fotoAlumno,
    ),
    "alumno11" => array(
        "Nombre" => "Fernández Balsera, Daniel",
        "Imagen" => $fotoAlumno,
    ),
    "alumno12" => array(
        "Nombre" => "Ferrer López, Jesús",
        "Imagen" => $fotoAlumno,
    ),
    "alumno13" => array(
        "Nombre" => "Frías Rojas, Jesús",
        "Imagen" => $fotoAlumno,
    ),
    "alumno14" => array(
        "Nombre" => "Galán Navas, Manuel",
        "Imagen" => $fotoAlumno,
    ),
    "alumno15" => array(
        "Nombre" => "García Báez, Víctor",
        "Imagen" => $fotoAlumno,
    ),
    "alumno16" => array(
        "Nombre" => "García Díaz, Lucía",
        "Imagen" => $fotoAlumno,
    ),
    "alumno17" => array(
        "Nombre" => "González Martínez, Adrián",
        "Imagen" => $fotoAlumno,
    ),
    "alumno18" => array(
        "Nombre" => "Mariño Jiménez, Enrique",
        "Imagen" => $fotoAlumno,
    ),
    "alumno19" => array(
        "Nombre" => "Martín-Castaño Carrillo, Oscar",
        "Imagen" => $fotoAlumno,
    ),
    "alumno20" => array(
        "Nombre" => "Mayén Pérez, José María",
        "Imagen" => $fotoAlumno,
    ),
    "alumno21" => array(
        "Nombre" => "Mérida Velasco, Pablo",
        "Imagen" => $fotoAlumno,
    ),
    "alumno22" => array(
        "Nombre" => "Mora Sánchez, Héctor",
        "Imagen" => $fotoAlumno,
    ),
    "alumno23" => array(
        "Nombre" => "Pérez Cantarero, Luis",
        "Imagen" => $fotoAlumno,
    ),
    "alumno24" => array(
        "Nombre" => "Romero Romero, Carlos",
        "Imagen" => $fotoAlumno,
    ),
    "alumno25" => array(
        "Nombre" => "Ruiz Molero, Javier",
        "Imagen" => $fotoAlumno,
    ),
    "alumno26" => array(
        "Nombre" => "Vaquero Abad, Alejandro",
        "Imagen" => $fotoAlumno,
    ),
    "alumno27" => array(
        "Nombre" => "Villén Moyano, Luís Miguel",
        "Imagen" => $fotoAlumno,
    )
);



// Comprobamos el envío del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumnoSeleccionado = $_POST['alumno'];
    $nombreAlumno = $alumnos[$alumnoSeleccionado]['Nombre'];
    $imagenAlumno = $alumnos[$alumnoSeleccionado]['Imagen']['imagenAlumno'];


}
?>


<!--Creamos un apartado HTML5 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección Alumnos Daniel Fernándezt</title>
</head>
<body>
   <div class="container">

   <h1 >Selecciona un alumno</h1>

    <form method="POST">

    <select name="alumno">

    <?php 
    
    foreach ($alumnos as $clave => $alumno) 

    echo "<option value={$clave}>{$alumno['Nombre']}</option>";
    
    ?>

    </select>
    <button type="submit">Mostrar Información</button>
    </form>
    <?php 
        // Solo mostrar la sección si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && $nombreAlumno) {  ?>
                <div class="result">
                    <strong>Alumno:</strong><br>
                    <?php echo htmlspecialchars($nombreAlumno); ?><br><br>
                    <img src="<?php echo htmlspecialchars($imagenAlumno)?>" alt="">
                </div>
            <?php } 
        
        ?>

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


        select {

            width: 100%;
            padding: 20px;
            margin-bottom: 30px;
            border: 2px solid;
            border-radius: 5px;
            font-size: 20px;

        }

        button {

            width: 100%;
            padding: 20px;
            background-color: #4a8fc5;
            margin-bottom: 20px;
            color: white;
            font-size: 40px;

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