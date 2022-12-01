<?php

session_start();

use App\Exceptions\RouteNotFoundException;
use App\Router\Router;
use App\Core\Server;

require "../../vendor/autoload.php";
require "../Config/Route.php";
require "../Config/Constant.php";

$router = new Router();
//var_dump($routes, $_SERVER("REQUEST_URI"));
try {
    $router->run(Server::key("REQUEST_URI"), $routes);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}