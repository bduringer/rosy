<?php

namespace app\http;

class Kernel
{
    private array $routes = [];

    public function get(string $name, array $controllerAndMethod){
        if(!isset($this->routes['get'][$name])){
            $this->routes['get'][$name] = $controllerAndMethod;
        } else {
            throw new \Exception("The route $name already exists");
        }
    }

    public function post(string $name, array $controllerAndMethod){
        if(!isset($this->routes['post'][$name])){
            $this->routes['post'][$name] = $controllerAndMethod;
        } else {
            throw new \Exception("The route $name already exists");
        }
    }

    public function registerRoutes()
    {
        return $this->routes;
    }
}
