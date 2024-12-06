<?php
/**
 * 
 * 
 */
include './conf/config.php';

if (!isset($_POST['enviar'])) {
    header('Location: test3.php');
}

//Obtenemos la extensión, podriamos hacerlo tambien con pathinfo() más adelante.
$temp = explode(".", $_FILES["file"]["name"]); //File es el nombre del input
$extension = end($temp);

if (( $_FILES["file"]["size"] < MAXSIZE) &&
    in_array($_FILES["file"]["type"],$allowedFormat) &&
    in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    } else {
        $filename = $_FILES["file"]["name"];
        //Codificamos el nombre del fichero en el servidor
        $filename = uniqid().'.'.pathinfo($filename,PATHINFO_EXTENSION);
        if (file_exists(DIRUPLOAD .$filename ))  {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else {
            move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
    
        }
        echo "<br/>";
        //Volver desde php
        echo "<a href=\"".$_SERVER['HTTP_REFERER']."\">Volver</a>"; // No se recomienda.
        
        // volver desde javasript
        echo '<a href="javascript:history.back()">Volver</a>'; // Mejor.
    }

    }
    

$grupo = $_POST['grupo'];
$curso = $_POST['curso'];
$formato = $_POST['formato'];

echo $grupo . '<br/>';
echo $curso . '<br/>';
echo $formato . '<br/>';



?>