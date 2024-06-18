<?php
require_once 'vendor/autoload.php';

$routes = function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Controller::index');
    $r->addRoute('GET', '/home', 'Controller::home');
    $r->addRoute('POST', '/store', 'Controller::store');
    $r->addRoute('GET', '/edit/{id}', 'Controller::edit');
};

$dispatcher = FastRoute\simpleDispatcher($routes);
