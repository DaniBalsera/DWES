<?php

require_once("../boostrap.php");
require_once("../vendor/autoload.php");
require_once("../app/Controllers/MascotasController.php");

use App\Core\Router;
use App\Controllers\MascotasController;
$router = new Router();

$router-> add(array (
    "name"=> "primera",
    'path'=> '/^\/$/',
    'action' => [MascotasController::class, 'IndexAction']
));

$request = $_SERVER['REQUEST_URI'];
$route = $router -> match($request);

if($route){
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
}else{
    echo "No route";
}

?>