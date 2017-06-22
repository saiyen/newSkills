	<?php

   	// Load the vendor
	require_once __DIR__.'/../vendor/autoload.php';

   	// Using the Silex app to redirect views
	$app = new Silex\Application();

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

	// Access the data that has been posted by the form 
	$title = $_POST['title'];  
	$message = $_POST['message'];  
	$authorID = $_POST['authorID'];  

	// Insert data into database
    $sql = "INSERT INTO post (title, message, auteurID) VALUES ('$title', '$message', '$authorID')";
	$app['db']->query($sql);

	$app['db']->close();

?>

