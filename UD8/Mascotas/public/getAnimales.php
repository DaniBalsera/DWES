<?php
require '../vendor/autoload.php';
require '../boostrap.php';

use App\Controllers\AnimalesController;

$q = $_GET['q'];

$animales = new AnimalesController();
$animales->ShowAction($q);
?>
