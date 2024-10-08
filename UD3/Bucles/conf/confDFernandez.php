<?php  

$principales = [

    "Arrays" => "/DWES/UD3/Arrays",
    "Bucles" => "/DWES/UD3/Bucles",
    "Condiciones" => "/DWES/UD3/Condiciones",
    
];

$urlArrays = $principales['Arrays'];
$urlBucles = $principales['Bucles'];
$urlCondiciones = $principales['Condiciones'];


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
    <p class="pActividades">Unidad 3</p>
   
    <div class="carpetas">
        <div class="carpeta">
            <a href="<?php echo $urlArrays; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Arrays</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlBucles; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Bucles</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlCondiciones; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Condiciones</p>
            </a>
        </div>
    </div>
</div>

</body>
</html>
