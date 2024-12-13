<?php
/**
 * Archivo de configuración
 */

// Definición de constantes
define("LINECABECERA", 1);
define("ANIOINICIO", 2020);
define("ANIOFINAL", 2030);

// Directorio donde se subirán los archivos
define("DIRUPLOAD", "./upload/");
// Tamaño máximo del archivo
define("MAXSIZE", 200000);

// Arrays para reemplazar caracteres
$caracteres = array("Á", "á", "É", "é", "Í", "í", "Ó", "ó", "Ú", "ú", "Ü", "ü", "Ñ", "ñ", ",");
$caracteresReemplazar = array("A", "a", "E", "e", "I", "i", "O", "o", "U", "u", "U", "u", "N", "n", "");

// Arrays para los campos del formulario
$grupos = array("1DAW", "2DAW", "1ASIR", "2ASIR");
$formato = array("Linux", "MySql");

// Extensiones y formatos válidos
$allowedExt = array("csv");
$allowedFormat = array("text/csv");
?>