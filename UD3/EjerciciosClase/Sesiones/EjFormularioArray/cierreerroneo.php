<?php

// Iniciamos la sesion´

session_start();

// Vaciamos la sesion

session_unset();

// La destruimos

session_destroy();

header("Location: EjercicioErroneo.php");

?>