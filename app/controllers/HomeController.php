<?php

namespace Framework\Rosy\controllers;

class HomeController
{
    public function index()
    {
        // Chama a visualização correspondente
        require dirname(__FILE__,3) . '/resources/views/home.php';

    }
}
