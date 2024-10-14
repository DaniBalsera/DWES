<?php  

$principales = [

    "Ej1" => "/DWES/UD3/Arrays/Ejercicio1/DFernandezEjercicio1Juego.php",
    "Ej2" => "/DWES/UD3/Arrays/Ejercicio1/DFernandezEjercicio1Meses.php",
    "Ej3" => "/DWES/UD3/Arrays/Ejercicio1/DFernandezEjercicio1Notas.php",
    "Ej4" => "/DWES/UD3/Arrays/Ejercicio1/DFernandezEjercicio1Paises.php",
    "Ej5" => "/DWES/UD3/Arrays/Ejercicio1/DFernandezEjercicio1Verbos.php",
    
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
<a href="/DWES/UD3/Arrays/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
    <p class="pActividades">Ejercicio1</p>
   
    <div class="carpetas">
        <div class="carpeta">
            <a href="<?php echo $urlEj1; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Barcos</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj2; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Meses</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj3; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Notas</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj4; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Paises</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlEj5; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Verbos</p>
            </a>
        </div>
    </div>
</div>

</body>
</html>
