<?php
/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

// Array con la imagen de cada plato

$fotoPlato = array(

"imagenTortilla" => "tortilla.jpeg",
"imagenGazpacho" => "gazpacho.jpg",
"imagenEnsalada" => "ensalada.jpg",
"imagenSalmorejo" => "salmorejo.jpg",
"imagenPaella" => "paella.jpg",
"imagenCochinillo" => "cochinillo.jpg",
"imagenFabada" => "fabada.jpg",
"imagenPulpo" => "pulpo.jpg",
"imagenNatilla" => "natillas.jpg",
"imagenFlan" => "flan.png",
"imagenPastel" => "pastelcatalan.jpg"

);

// Array con platos
$platos = array(
    "PrimerPlato" => array(
        "primero1" => array(
            "Nombre" => "Tortilla de patatas",
            "Precio" => 5,
            "imagen" => $fotoPlato["imagenTortilla"]
        ),
        "primero2" => array(
            "Nombre" => "Gazpacho",
            "Precio" => 4,
            "imagen" => $fotoPlato["imagenGazpacho"]
        ),
        "primero3" => array(
            "Nombre" => "Ensalada mixta",
            "Precio" => 4.5,
            "imagen" => $fotoPlato["imagenEnsalada"]
        ),
    ),
    "SegundoPlato" => array(
        "segundo1" => array(
            "Nombre" => "Salmorejo",
            "Precio" => 6,
            "imagen" => $fotoPlato["imagenSalmorejo"]
        ),
        "segundo2" => array(
            "Nombre" => "Paella",
            "Precio" => 12,
            "imagen" => $fotoPlato["imagenPaella"]
        ),
        "segundo3" => array(
            "Nombre" => "Cochinillo asado",
            "Precio" => 15,
            "imagen" => $fotoPlato["imagenCochinillo"]
        ),
        "segundo4" => array(
            "Nombre" => "Fabada asturiana",
            "Precio" => 10,
            "imagen" => $fotoPlato["imagenFabada"]
        ),
        "segundo5" => array(
            "Nombre" => "Pulpo a la gallega",
            "Precio" => 14,
            "imagen" => $fotoPlato["imagenPulpo"]
        ),
    ),
    "Postres" => array(
        "postre1" => array(
            "Nombre" => "Natillas",
            "Precio" => 3,
            "imagen" => $fotoPlato["imagenNatilla"]
        ),
        "postre2" => array(
            "Nombre" => "Flan casero",
            "Precio" => 3.5,
            "imagen" => $fotoPlato["imagenFlan"]
        ),
        "postre3" => array(
            "Nombre" => "Pastel Catalán",
            "Precio" => 4,
            "imagen" => $fotoPlato["imagenPastel"]
        ),
    ),
);
// Comprobamos el envío del formulario del plato 1
$nombrePlato1 = $nombrePlato2 = $nombrePostre = "";
$precioFinal = 0.00;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plato1Seleccionado = $_POST['plato1'];
    $plato2Seleccionado = $_POST['plato2'];
    $postreSeleccionado = $_POST['postre'];


// Obtenemos los nombres de los platos     
    $nombrePlato1 = $platos["PrimerPlato"][$plato1Seleccionado]["Nombre"];
    $nombrePlato2 = $platos["SegundoPlato"][$plato2Seleccionado]["Nombre"];
    $nombrePostre = $platos["Postres"][$postreSeleccionado]["Nombre"];



// Obtener las imágenes de los platos seleccionados
    $imagenPlato1 = $platos["PrimerPlato"][$plato1Seleccionado]["imagen"];
    $imagenPlato2 = $platos["SegundoPlato"][$plato2Seleccionado]["imagen"];
    $imagenPostre = $platos["Postres"][$postreSeleccionado]["imagen"];
    
// Realizamos las operaciones necesarias para los descuentos
    
    $precioP1 =  $platos["PrimerPlato"][$plato1Seleccionado]["Precio"];
    $precioP2 =  $platos["SegundoPlato"][$plato2Seleccionado]["Precio"];
    $precioPostre =  $platos["Postres"][$postreSeleccionado]["Precio"];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $plato1Seleccionado = $_POST['plato1'] ?? null;
        $plato2Seleccionado = $_POST['plato2'] ?? null;
        $postreSeleccionado = $_POST['postre'] ?? null;
    
        if ($plato1Seleccionado && $plato2Seleccionado && $postreSeleccionado) {
            $media = ($precioP1 + $precioP2 + $precioPostre) / 3;

            $descuento = $media * 0.20;
        
            $precioFinal = $media - $descuento;
        
           
        }
    }
    

}





?>


<!--Creamos un apartado HTML5 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de menú</title>
</head>
<body>
<div class="container">
       <h1 class="titulo">Selecciona un menú</h1>
       <form method="POST">
           <label for="plato1">Primer Plato:</label>
           <select name="plato1">
               <?php 
               foreach ($platos["PrimerPlato"] as $clave => $plato) {
                   echo "<option value='{$clave}'>{$plato['Nombre']}</option>";
               }
               ?>
           </select>

           <label for="plato2">Segundo Plato:</label>
           <select name="plato2">
               <?php 
               foreach ($platos["SegundoPlato"] as $clave => $plato) {
                   echo "<option value='{$clave}'>{$plato['Nombre']}</option>";
               }
               ?>
           </select>

           <label for="postre">Postre:</label>
           <select name="postre">
               <?php 
               foreach ($platos["Postres"] as $clave => $plato) {
                   echo "<option value='{$clave}'>{$plato['Nombre']}</option>";
               }
               ?>
           </select>

           <br><button type="submit">MOSTRAR MENÚ</button>
       </form>
   
       <!--Comprobamos que hemos obtenido los platos y postres, y mostramos la información con los formatos adecuados !-->

       <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $plato1Seleccionado && $plato2Seleccionado && $postreSeleccionado): ?>
        <h2>Menú Seleccionado</h2>
        <div class="menu-item">
            <img src="<?php echo htmlspecialchars($imagenPlato1); ?>" alt="<?php echo htmlspecialchars($nombrePlato1); ?>">
            <p>Primer Plato: <?php echo htmlspecialchars($nombrePlato1); ?></p>
        </div>
        <div class="menu-item">
            <img src="<?php echo htmlspecialchars($imagenPlato2); ?>" alt="<?php echo htmlspecialchars($nombrePlato2); ?>">
            <p>Segundo Plato: <?php echo htmlspecialchars($nombrePlato2); ?></p>
        </div>
        <div class="menu-item">
            <img src="<?php echo htmlspecialchars($imagenPostre); ?>" alt="<?php echo htmlspecialchars($nombrePostre); ?>">
            <p>Postre: <?php echo htmlspecialchars($nombrePostre); ?></p>
        </div>
        <div class="price">
            <p>Precio Final: <?php echo number_format($precioFinal, 2); ?> €</p>
        </div>
    <?php endif; ?>

    <!--!-->
    <style>
        body {
            background: #fee61a;
            font-family: 'Arial', sans-serif;
            color: #3b2f1a;
        }
        .container {
            background: #da885e;
            border-radius: 8px;
            max-width: 700px;
            margin: auto;
            text-align: center;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #3b2f1a;
        }
        select, button {
            width: 80%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #fee61a;
            color: brown;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #ffcf40;
        }
        .menu-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .menu-item img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .price {
            font-size: 18px;
            color: #3b2f1a;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>

</body>
</html>