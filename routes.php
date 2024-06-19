<?php

$routes = function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Controller::index');
    $r->addRoute('GET', '/get', 'Controller::get');
    $r->addRoute('GET', '/create', 'Controller::create');
    $r->addRoute('POST', '/store', 'Controller::store');
    $r->addRoute('GET', '/edit/{id}', 'Controller::edit');
    $r->addRoute('GET', '/find/{id}', 'Controller::find');
     $r->addRoute('POST', '/update/{id}', 'Controller::update');
};

$dispatcher = FastRoute\simpleDispatcher($routes);
