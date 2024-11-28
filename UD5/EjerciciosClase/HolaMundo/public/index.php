<?php
require_once "../app/Config/conf.php";
require_once "../vendor/autoload.php";

use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/$/',
    'action'=>[IndexController::class, 'IndexAction'],
    
    
));

$router->add(array(
    'name'=>'mensaje',
    'path'=> '/^\/saludo\/([a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_-]+)$/',
    'action'=>[IndexController::class, 'HelloAction'],
    
    
));

$router->add(array(
    'name'=>'pares',
    'path'=> '/^\/numeros\/pares)$/',
    'action'=>[IndexController::class, 'ParesAction'],
    
    
));



$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
echo $request;
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
    
}else{
    echo "<br/>";
    echo "Route not found";
  
}
?>
