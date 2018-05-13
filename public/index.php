<?php

require __DIR__ . '/../vendor/autoload.php';


$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([

]);



$container = $builder->build();


$dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $route) {
    require '../App/Route/route.php';

//    $route->get('/index','App\Controller\IndexController@index');
//    $route->get('/index','App\Controller\IndexController');
    $route->get('/index',\App\Controller\IndexController::class);
//    $route->get('/set','App\Controller\IndexController@set');
});


$middlewareQueue[] = new \Middlewares\FastRoute($dispatcher);


$middlewareQueue[] = new \Middlewares\RequestHandler($container);


$requestHandler = new \Relay\Relay($middlewareQueue);

$response = $requestHandler->handle(\Zend\Diactoros\ServerRequestFactory::fromGlobals());

$emmitter = new \Zend\Diactoros\Response\SapiEmitter();

return $emmitter->emit($response);