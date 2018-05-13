<?php

//use FastRoute\RouteCollector;


$route->get('/user', function (\Psr\Http\Message\ServerRequestInterface $request,$handler) {
    $response = new \Zend\Diactoros\Response();

    $response->getBody()->write('user');

    return $response;
});

