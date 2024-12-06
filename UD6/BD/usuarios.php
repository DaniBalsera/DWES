<?php
/**
 * Conectarse a una base de datos
 * @author raul <email>
*/

include("lib/function.php");

// Mostrar los valores
$user = $passwd = "";
$autenticado = false;
session_start();
$estadoAnadir = false;
$estadoEliminar = false;
if (isset($_POST['enviar'])) {
    $user = $_POST['usuario'];
    $passwd = $_POST['contrasena'];
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
    $db = conectaDB();
    $newArray = array(":usuario" => $user, ":password" => $passwd);
    $consulta = $db->prepare($sql);
    $consulta->execute($newArray);
    $resultado = $consulta->fetchAll();

    if ($resultado) {
        echo "Te has autenticado";
        $_SESSION['logueado'] = true;
        $_SESSION['nombre'] = $user;
        $_SESSION['administrador'] = false;
        if ($user == "admin" && $passwd == "admin"){
            $_SESSION['administrador'] = true;
        } 
    } else {
        echo "Lo siento, credenciales incorrectas";
    }
}

// Dos condiciones de búsqueda
$db = conectaDB();
$campo = $_POST['busqueda'] ?? '%';
$busca = $_POST['busqueda'] ?? '';
$sql = "SELECT * FROM perros WHERE nombre LIKE :nombre OR raza LIKE :nombre";

$newArray = array(":nombre" => $campo . "%");
$consulta = $db->prepare($sql);
$consulta->execute($newArray);
$resultado = $consulta->fetchAll();

// Cargamos datos para la vista
$data = $resultado;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Mascotas</title>
</head>
<body>
    <?php

    if(isset($_SESSION['logueado'])){

    ?>
          <form method="post" action="cierreSesion.php">
            <input type="submit" name="cerrar" value="Cerrar sesión">
        </form>
    <?php
   

    if ($_SESSION['administrador']) {
        $estadoAnadir = true;
        $estadoEliminar = true;
    ?>
        <h2>Te has autenticado como administrador</h2>
        <form method="post" action="cierreSesion.php">
            <input type="submit" name="cerrar" value="Cerrar sesión">
        </form>

        <?php
   
    }  }
    else {
        $estadoAnadir = false;
        $estadoEliminar = false;
        //Incluir aqui el loginView
    ?>
        <h2>Login</h2>
        <form method="post" action="">
            <label>Usuario:</label>
            <input type="text" name="usuario"><br/>
            <label>Contraseña:</label>
            <input type="text" name="contrasena">
            <br/>
            <input type="submit" name="enviar"/>
        </form>
    <?php 
    }
    ?>

    <h2>Gestión de mascotas</h2>
    <form method="post" action="">
        <input type="text" name="busqueda" value="<?php echo htmlspecialchars($busca); ?>">
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <form action="nuevo.php" method="post">
        <input type="submit" name="insertar" value="+" <?php echo $estadoAnadir ? 'enabled' : 'disabled'; ?>>
    </form>

    <h2>Listado de mascotas</h2>
    <?php
    if (!$resultado) {
        echo "No se encontraron resultados.";
    } else {
        foreach ($data as $valor) {
            echo htmlspecialchars($valor['nombre']) . " - " . htmlspecialchars($valor['peso']) . " - " . htmlspecialchars($valor['raza']) . 
            ($estadoEliminar ? " <a href='del.php?id=" . htmlspecialchars($valor['id']) . "'>del</a>" : '') . "<br/>";
                }
    }
    ?>
</body>
</html>
