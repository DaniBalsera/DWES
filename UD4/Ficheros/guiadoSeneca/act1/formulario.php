<?php
/**
 * 
 * @author Luismi
 * 
 */
//$mActual = date('m');
//$aActual = date('Y');

$mActual = 4;
$aActual = 2024;
$check = false;

include './conf/config.php';

$av_array = [];


for ($i=A_INICIO; $i <= A_FINAL ; $i++) { 
    $anno = $i . '/' . $i + 1;

    if (($i == $aActual && $mActual >8) || ($i +1 == $aActual && $mActual < 8)) {
        $check = true;
        $av_array[] = [$anno, $check];
    } else{
        $check == false;
        $av_array[] = [$anno, $check];
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act1 - ficheros</title>
</head>
<body>
    <h1>Creación de usuarios</h1>
    <form action="./form_procesa.php" method="post">
    
    <!-- Seleccionamos grupo -->
    <label for="grupo">Grupo: </label>
        <select name="grupo" id="grupo">
            <?php
                foreach ($grupos as $valor) {
                    echo "<option value=" . $valor . ">" .$valor ."</option>";
                }
            ?>
        </select> <br>

        <!-- Seleccionamos curso -->
        <label for="curso">Curso: </label>
        <select name="curso" id="curso">
        <?php
                foreach ($av_array as $valor) {
                    echo "<option value=" . $valor . ">" .$valor ."</option>";
                }
            ?>
        </select> <br>

        <!-- Seleccionamos formato -->
        <label for="formato">Formato: </label>
        <select name="formato" id="formato">
        <?php
                foreach ($formato as $valor) {
                    echo "<option value=" . $valor . ">" .$valor ."</option>";
                }
            ?>
        </select> <br> <br>

        <input type="file" name="file" id="file">

        <input type="submit" value="enviar" name="submit">
    </form>
</body>
</html>