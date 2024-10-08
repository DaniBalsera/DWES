<?php 

/**
 * 
 * @author Daniel Fernández Balsera
 * 
 */

 // Definimos un array

 $arrayGrupos = array("1º DAW", "2º DAW", "1º ASIR", "2º ASIR"); // Array indexado




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
   
        
       
        <form action="procesa.php" method="post">

        <input type="text" name ="nombre" id ="">
        <input type="text" name ="apellidos" id ="">
        <input type="text" name ="email" id ="">
        <select name="grupos" id="">
            <?php 
            
            foreach($arrayGrupos as $key => $valor){

                echo '<option value="'. $valor .'">'.$valor.'</option>';
            }
            ?>
        <input type="submit" name="enviar" value="enviar">


        </select>

        </form>

    </body>
</html>

