<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

 // Definimos un array

 //$arrayGrupos = array("1º DAW", "2º DAW", "1º ASIR", "2º ASIR"); // Array indexado

    $lProcesaFormulario = False;

 

// Comprobar que se ha pulsado el boton de enviar

    if(isset($_POST['enviar'])){

    
    $lProcesaFormulario = true;
    }


    if($lProcesaFormulario){

    // Recogemos los datos

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST<['email'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato introducido no es correcto";
    }


    // Los mostramos

   

    echo "Nombre: $nombre";
    echo "Apellidos: $apellidos";
    echo "Email  $email";
    }
    

  else{

    ?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
   
        
       
        <form action="" method="post" novalidate>

        <input type="text" name ="nombre" id =""> <br>
        <input type="text" name ="apellidos" id =""><br/>
        <input type="text" name ="email" id =""><br/>
       <!-- <select name="grupos" id=""><br>
            <?php 
            
            foreach($arrayGrupos as $key => $valor){

                echo '<option value="'. $valor .'">'.$valor.'</option>';
            }
            ?>
    


        </select><br/> -->

        <input type="submit" name="enviar" value="enviar">

        
        </form>

    </body>
</html>

<?php 

        }

?>