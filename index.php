<?php

// Load the vendor
require_once __DIR__.'/../vendor/autoload.php';

// Setup the Twig environment
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('debug' => true));

// Using new app to redirect views
$app = new Silex\Application();

$app->get('/', function() use ($app) {
    return 'Index pagina';
});

$app->get('/post/{id}', function($id) use ($app) {
    return 'Dit is post: '. $id;
});

$app->run();
