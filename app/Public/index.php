<?php

session_start();

use App\Exceptions\RouteNotFoundException;
use App\Router\Router;

require "../../vendor/autoload.php";
require "../Config/Route.php";
require "../Config/Constant.php";

$router = new Router();
//var_dump($routes, $_SERVER("REQUEST_URI"));
try {
    $router->run($_SERVER["REQUEST_URI"], $routes);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}