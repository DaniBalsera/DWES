<?php

// Iniciamos la sesión

session_start();

// Creamos la bandera


$procesaFormulario = false;

// Variables de error

$errorNombre = "";
$errorTfno = "";
$errorEmail = "";

// Variables de campo

$nombre = "";
$tfno = "";
$email = "";


if(!isset($_SESSION["contactos"])){
    $_SESSION["contactos"] = array();
}

if(isset($_POST["enviar"])){
$procesaFormulario = true;

}

if($procesaFormulario){
    $nombre = $_POST["nombre"];
    $tfno = $_POST["tfno"];
    $email = $_POST["email"];

    if($nombre == ""){
        $errorNombre = "Campo requerido";
        $procesaFormulario = false;
    }

    
    if($tfno == ""){
        $errorTfno = "Campo requerido";
        $procesaFormulario = false;
    }

    if($email == "" || (!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $errorEmail = "Campo requerido";
        $procesaFormulario = false;
    }

    $_SESSION["contactos"][] = array(
        "nombre" => $nombre,
        "telefono" => $tfno,
        "email"=> $email,
    );
 
}

else{
   

    $nombre = "";
    $tfno = "";
    $email = "";

}
$data = $_SESSION["contactos"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

      nombre: <input type="text" name="nombre" id="nombre"> <?php echo $errorNombre ?> <br/>
      telefono: <input type="text" name="tfno" id="tfno">  <?php echo $errorTfno ?> <br/>
      Correo: <input type="text" name="email" id="email">  <?php echo $errorEmail ?> <br/>

    <input type="submit" value="Enviar" name="enviar">

    <h1>Lista de contactos</h1>
    <?php 
    
    foreach($data as $clave => $valor){
       
        echo $valor["nombre"] . " / " . $valor["email"] . " / " . $valor["telefono"] . "<br/>";
    }   
 
    
    ?>
    </form>
</body>
</html>