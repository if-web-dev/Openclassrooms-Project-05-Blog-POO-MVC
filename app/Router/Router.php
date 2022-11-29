<?php

namespace App\Router;

class Router {

    public function run(string $uri, array $routes)
    {
        $path = explode("?", $uri)[0];

        
        if (array_key_exists($path, $routes)) {

            $controllerName = $routes[$path][0];
            $methodController = $routes[$path][1];
            $controller = new $controllerName();

            return $controller->$methodController();

        } else {

            header("location: 404");
        }
    }
}
