<?php
use app\http\Engine;
use app\helpers\Macros;
use app\http\Router;

function path(){
    return $_SERVER['REQUEST_URI'];
}

function request(){
    return strtolower($_SERVER['REQUEST_METHOD']);
}

function execRouter(){
    try {
        $routes = require '../routes/web.php';
        $router = new Router;
        $router->execute($routes);
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}

function view(string $view, array $data = []){
    try {
        $engine = new Engine;
        $engine->dependecies([new Macros]);
        echo $engine->render($view,$data);
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}

function redirect(string $to){
    return header('location: '.$to);
}