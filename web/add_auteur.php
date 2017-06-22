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
	$name = $_POST['name'];  
	$familyname = $_POST['familyname'];  
	$age = $_POST['age'];  

	// Insert data into database
    $sql = "INSERT INTO auteur (naam, achternaam, leeftijd) VALUES ('$name', '$familyname', '$age')";
	$app['db']->query($sql);

	$app['db']->close();

?>

