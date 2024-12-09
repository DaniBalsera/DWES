<?php

// Almaceno las imagenes en un array
session_start();

$imagenesArriba = array("piezas/1.jpg", "piezas/2.jpg", "piezas/3.jpg", "piezas/7.jpg", "piezas/8.jpg", "piezas/9.jpg");
$imagenesAbajo = array("piezas/4.jpg",  "piezas/5.jpg", "piezas/6.jpg", "piezas/10.jpg", "piezas/11.jpg", "piezas/12.jpg");

if(isset($_POST['imagen1'])){
    $indImagen1 = array_rand($imagenesArriba);
    $imagen1 = $imagenesArriba[$indImagen1];
}

if(isset($_POST['imagen2'])){
    $indImagen2 = array_rand($imagenesAbajo);
    $imagen2 = $imagenesAbajo[$indImagen2];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<br/><br/>
<form action="" method="post">

    <button name="imagen1"><img src="<?php echo $imagen1 ?>" alt=""></button><br/>
    <button name="imagen2"><img src="<?php echo $imagen2 ?>" alt=""></button><br/>
    
    <input type="submit" value="resolver">
    <input type="submit" value="reiniciar">

</form>

</body>

</html>