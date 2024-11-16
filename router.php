<?php
    
    require_once './libs/router.php';

    require_once './app/controllers/ApiController.php';

    $router = new Router();

    #                 endpoint        verbo     controller             metodo
    $router->addRoute('juegos'      , 'GET',    'ApiController',   'getAll');
    //$router->addRoute('juegos/:id'  , 'GET',    'ApiController',   'get');
    $router->addRoute('juegos/:id'  , 'DELETE', 'ApiController',   'delete');
    //$router->addRoute('juegos'      , 'POST',   'ApiController',   'add');
    $router->addRoute('juegos/:id'  , 'PUT',    'ApiController',   'update');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);