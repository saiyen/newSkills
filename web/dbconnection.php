<?php
    // Connect to database : DB connectie moet geinclude worden om herhaling in code te voorkomen
	$connectionParams = array(
    'dbname' => 'newskills',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
	);

	$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'newskills',
	    'user' => 'root',
	    'password' => '',
	    'host' => 'localhost',
    	),
	));