<?php

/**
 * @author Daniel
 * 
 */

 include("lib/function.php");
/**
 * if (isset($_POST['enviar'])){
 *  $busqueda = $_POST['busqueda']; 
 * }else{
 *  $busqueda = '%';
 * }
 * 
 */
// Probar la conexión
 $db = conectaDB();
 $busqueda = $_POST['busqueda'] ?? '';
 $valBusqueda = $busqueda;
 $sql = "SELECT * FROM perros where nombre LIKE :nombre OR raza LIKE :raza";
 $consulta = $db -> prepare($sql);
 $consulta -> execute(array(
                             ":nombre" => $busqueda.'%',
                             ":raza" => $busqueda.'%'));
 $resultado = $consulta->fetchAll();
 $numerosRegistros = $consulta -> rowCount();
 $data = $resultado;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br/>
    <h1>GESTIÓN MASCOTAS</h1>

    <div>
        <?php echo "<h2>Bienvenido usuario </h2>"; ?>
    </div>


    <form action="" method="post">

    <input type="text" name="busqueda" id="busqueda" value="<?php echo $valBusqueda?>">
    <input type="submit" name="buscar" id="buscar" value="Buscar">
    </form>
    
    <form action="nuevo.php" method="post">
        <input type="submit" value="+" id="anadir" name='anadir'>
    </form>


    <h2>Listado de mascotas</h2>
    
    <?php
        // $data-> array cargado con los datos a mostrar
        foreach($data as $valor){

            echo "". $valor['nombre']. "-" . $valor['peso'] . "-" . $valor['raza'] . "<a href=\"borrar.php?id= ". $valor['id'] ."\">Del</a>" ."<br/>";


        }

    ?>
</body>
</html>
