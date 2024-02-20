<?php 

    use app\http\Router;
    
    $router = new Router();

    $router->get('/', 'HomeController@index');

    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    $response = $router->dispatch($method, $uri);

    echo $response;
