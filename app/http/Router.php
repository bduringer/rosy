<?php

namespace app\http;

class Router
{
    protected $routes = [];

    public function get($uri, $handler)
    {
        $this->routes['GET'][$uri] = $handler;
    }

    public function dispatch($method, $uri)
    {
        if (!isset($this->routes[$method][$uri])) {
            return '404 Not Found';
        }

        $handler = $this->routes[$method][$uri];
        // Aqui você pode chamar o controlador e a ação correspondentes
        return $handler;
    }
}
