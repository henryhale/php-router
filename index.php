<?php

// for `view` function & `Asset` class
require_once __DIR__ . '/lib/extras/index.php'; 

// for `Router` class
require_once __DIR__ . '/lib/router.php'; 

// for `defineRoutes` function 
require_once __DIR__ . '/routes.php'; 

// create new instance of the router
$router = new Router();

// add routes
defineRoutes($router);

// set assets folder path
Asset::setBase('/assets');


try {

    // parse request and execute the corresponding route
    $router->handleRequest();

} catch (\Throwable $th) {

    // In `dev mode`, you may uncomment the next line to debug your application
    //throw $th;

    // otherwise redirect to an existing (error handling) route
    $router->redirect('/404?err=' . urlencode($th->getMessage()));

}