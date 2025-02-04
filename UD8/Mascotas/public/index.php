<?php

require_once("../boostrap.php");
require_once("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\AnimalesController;

$router = new Router();

$router->add([
    "name" => "animales",
    "path" => "/^\/(\?.*)?$/",
    "action" => [AnimalesController::class, "IndexAction"]
]);



$request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$route = $router->match($request);

if ($route) {
    $controllerName = $route["action"][0];
    $actionName = $route["action"][1];
    $controller = new $controllerName();
    $controller->$actionName($_GET["q"] ?? "");
} else {
    echo "No route";
}
?>
