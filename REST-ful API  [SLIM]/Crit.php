<?php
namespace RestApi;


##################################
#    ~ LIBRARIES & MODULES ~     #
##################################
//LOAD IN DB WRAPPER
require_once('databasePHP.php');
use \DatabaseConnection\DB as DB;

//LOAD IN SLIM LIBRARY
require_once('Slim/Slim.php');
\Slim\Slim::registerAutoloader();





##################################
#	~ INITIALIZATION ~       #
##################################
//create new slim object instance
//create and initialize new DB obj 
$app = new \Slim\Slim();
$db = new DB();
$db->init();







##################################
#	   ~ ROUTING ~           #
##################################



// GET route
$app->get('/document', function () {
	global $db;
	print( json_encode($db->retrieve()->getResults()) );    
});


// GET route (with id)
$app->get('/document/:id', function ($id) {
	global $db;
	print( json_encode($db->retrieve($id)->getResults()) );    
});


// POST route
$app->post('/document', function () {
    global $db;
    $_POST['data'];                 //needs editing for data input
    $db->create($id, $name, $url);
});


// PUT route
$app->put('/document/:id/:name/:url', function ($id, $name, $url) {
	global $db;
   	$db->update($id, $name, $url);
});

// DELETE route
$app->delete('/document/:id', function ($id) {
    	global $db;
   	$db->delete($id);
});



//start
$app->run();

?>