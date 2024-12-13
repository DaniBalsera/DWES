<?php
/**
 * Archivo de configuración
 */

// Definición de constantes
define("DIRIMAGES", "./imagenes/");
define("ADMIN_CREDENTIALS", "./conf/admin_credentials.php");

// Tamaño máximo del archivo
define("MAXSIZE", 2000000); // 2MB

// Extensiones y formatos válidos
$allowedExt = array("jpg", "jpeg", "png", "gif");
$allowedFormat = array("image/jpeg", "image/png", "image/gif");
?>