<?php  

$principales = [

    "Ej1" => "/DWES/UD3/Bucles/Ejercicio1/DFernandezEjercicio1.php",
    "Ej2" => "/DWES/UD3/Bucles/Ejercicio2/DFernandezEjercicio2.php",
    "Ej3" => "/DWES/UD3/Bucles/Ejercicio3/DFernandezEjercicio3.php",
    "Ej4" => "/DWES/UD3/Bucles/Ejercicio4/DFernandezEjercicio4.php",
    "Ej5" => "/DWES/UD3/Bucles/Ejercicio5/DFernandezEjercicio5.php",
    
];

$urlEj1 = $principales['Ej1'];
$urlEj2 = $principales['Ej2'];
$urlEj3 = $principales['Ej3'];
$urlEj4 = $principales['Ej4'];
$urlEj5 = $principales['Ej5'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleconf.css">
</head>
<body> 

<div class="contenedor">
<a href="/DWES/UD3/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
    <p class="pActividades">Bucles</p>
   
    <div class="carpetas">
        <div class="carpeta">
            <a href="<?php echo $urlEj1; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ejercicio 1</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj2; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ejercicio 2</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj3; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ejercicio 3</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj4; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ejercicio 4</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj5; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ejercicio 5</p>
            </a>
        </div>
    </div>
</div>

</body>
</html>
