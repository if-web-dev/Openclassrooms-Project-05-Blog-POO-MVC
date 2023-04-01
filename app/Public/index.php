<?php

session_start();

use App\Exceptions\RouteNotFoundException;
use App\Router\Router;


require "../../vendor/autoload.php";
require_once "../Config/Route.php";
require_once "../Config/Constant.php";


$router = new Router();

try {
    $router->run($_SERVER["REQUEST_URI"], $routes);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}