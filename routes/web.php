<?php

use app\http\Kernel;

$kernel = new Kernel();

// Defina suas rotas
$kernel->get('/', ['HomeController', 'index']);
$kernel->get('/user', ['UserController', 'index']);
$kernel->post('/user/${id}', ['UserController', 'update']);
// Adicione mais rotas conforme necessário

// Registre as rotas
return $kernel->registerRoutes();



