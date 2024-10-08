<?php 



if(!isset($_POST["enviar"])){

    header("location:index.php");


}



echo "Datos de formulario: ";

foreach($_POST as $clave => $valor){
    echo "<br><br/>";
    echo $valor;
    echo "<br/>";

} 



?>