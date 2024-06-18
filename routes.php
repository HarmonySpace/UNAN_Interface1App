<?php

$routes = function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Controller::index');
    $r->addRoute('GET', '/get', 'Controller::get');
    $r->addRoute('GET', '/create', 'Controller::create');
    $r->addRoute('POST', '/store', 'Controller::store');
    $r->addRoute('GET', '/edit/{id}', 'Controller::edit');
};

$dispatcher = FastRoute\simpleDispatcher($routes);
