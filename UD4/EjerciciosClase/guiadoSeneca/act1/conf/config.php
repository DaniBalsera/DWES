<?php
define("LINE_CABECERA", 1);
define("A_INICIO", 2010);
define("A_FINAL", 2030);
define("DIRUPLOAD",'upload/'); //Directorio para la subida de los archivos
define("MAXSIZE",200000);// Tamaño máximos

//Extensión permitida
$allowedExts = array("csv");
$allowedFormat = array("text/csv");

$caracteresBusqueda = array("Á", "á", "É", "é", "Í", "í", "Ó", "ó", "Ú", "ú", "Ú", "ü", "Ñ", "ñ", ",", "\"");

$caracteresRemplaza = array("A", "a", "E", "e", "I", "i", "O", "o", "U", "u","N", "n", " ", " ");

$grupos = array("1 DAW", "2 DAW", "1 ASIR", "2 ASIR");
$formato = array("Linux", "MySQL");

