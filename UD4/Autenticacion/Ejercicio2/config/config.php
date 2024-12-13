<?php

$users = [["usuario", "password"], ["admin", "12345"], ["dani", "dani123"]];

function clearData($texto) {
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
}

?>