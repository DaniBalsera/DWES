<?php

session_start();

if (!isset($_SESSION['nombre'])){

    $_SESSION['nombre'] = 'Daniel';
    $_SESSION['apellidos'] = 'Fernández Balsera';
}

?>