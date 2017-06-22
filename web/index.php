<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php

// Load the vendor
require_once __DIR__.'/../vendor/autoload.php';

// Using the Silex app to redirect views
$app = new Silex\Application();

// Using the Silex app to redirect views
$app->get('/', function() use ($app) {
    return '';
});


// Verkrijgen van een post pagina
$app->get('/post/{post_id}', function($post_id) use ($app) {
	// Toevoegen van een post class
	include("views\post.php");

	return "";
});


// Verkrijgen van een auteur pagina
$app->get('/auteur/{auteur_id}', function($auteur_id) use ($app) {
	// Toevoegen van een auteur class
	include("views\auteur.php");

	return "";
});


// Auteur toevoegen
$app->get('/auteur_toevoegen', function() use ($app) {
?>
<script type = "text/javascript">
$(function(){

    $('#submit').click(function(){
    $.ajax({

            url: 'add_auteur.php',
            type: 'POST',
            data: $('#form1').serialize(),
            success: function(result){
                 $('#response').remove();
                 $('#container').append('<p id = "response">' + result + '</p>');
                 $('#loading').fadeOut(500);
               }

         });         

    });
 });
</script>

 <form action='add_auteur.php' method='post' border='0' id="form1">
    <div id = "container">  <br>
        <label>Naam:            </label>    <input type='text' id="name" name='name' /><br><br>
        <label>Achternaam:      </label>    <input type='text' id="familyname" name='familyname' /><br><br>
        <label>Leeftijd:        </label>    <input type='text' id="age" placeholder="leeftijd in getallen" name='age' /><br><br>
        <input type='hidden' name='action' value='create' />
        <input type='button' value='Submit' id="submit" />
        <input type="reset" value="Reset" class="reset-org">
</form>

<?php
	return "";
});


// Post toevoegen
$app->get('/post_toevoegen', function() use ($app) {
?>
<script type = "text/javascript">
$(function(){

    $('#submit').click(function(){
    $.ajax({

            url: 'add_post.php',
            type: 'POST',
            data: $('#form1').serialize(),
            success: function(result){
                 $('#response').remove();
                 $('#container').append('<p id = "response">' + result + '</p>');
                 $('#loading').fadeOut(500);
               }

         });         

    });
 });
</script>

 <form action='add_post.php' method='post' border='0' id="form1">
    <div id = "container">  <br>
        <label>Titel:           </label>    <input type='text' id="title" name='title' /><br><br>
        <label>Bericht:      	</label>    <input type='text' id="message" name='message' /><br><br>
        <label>ID van auteur:   </label>    <input type='text' id="authorID" placeholder="ID van de auteur" name='authorID' /><br><br>
        <input type='hidden' name='action' value='create' />
        <input type='button' value='Submit' id="submit" />
        <input type="reset" value="Reset" class="reset-org">
</form>

<?php
	return "";
});

$app->run();

?>

