<?php  

$principales = [

    "UD1" => "/var/www/html/DWES/UD1",
    "UD2" => "/var/www/html/DWES/UD2",
    "UD3" => "/DWES/UD3/conf/confDFernandez.php",
    "Ruleta" => "/var/www/html/DWES/RuletaAlumnos",
];

$urlUD1 = $principales['UD1'];
$urlUD2 = $principales['UD2'];
$urlUD3 = $principales['UD3'];
$urlRuleta = $principales['Ruleta'];

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
    <p class="pActividades">WEB DE MIS ACTIVIDADES</p>
   
    <div class="carpetas">
        <div class="carpeta">
            <a href="<?php echo $urlUD1; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">UD1</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlUD2; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">UD2</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlUD3; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">UD3</p>
            </a>
        </div>
        <div class="carpeta">
            <a href="<?php echo $urlRuleta; ?>">
                <img src="CarpetaAnimada.png" style="width: 150px; height: auto; cursor: pointer;">
                <p class="unidad">Ruleta</p>
            </a>
        </div>
    </div>
</div>

</body>
</html>
