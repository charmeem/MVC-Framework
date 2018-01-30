<?php

/**
 * Front-controller
 */
//echo ' Requested URL is equal to "' . $_SERVER['QUERY_STRING'] .'"';
//echo ' Request URI is equal to "' . $_SERVER['REQUEST_URI'] .'"';

 
/**
 * Routing
 */
require '../Core/Router.php';

$router = new Router();

/**
 * Creating Routing Table
 * route name, array [controller name, action]
 */
$router->add( '' , ['controller' => 'Home', 'action' => 'index']); 
$router->add( 'student' , ['controller' => 'Students', 'action' => 'index']);
$router->add( 'teacher' , ['controller' => 'Teachers', 'action' => 'index']);
$router->add( 'course' , ['controller' => 'Courses', 'action' => 'index']);
// Adding variable routes
$router->add('{controller}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('{controller}/{slug:\d+}/{action}');

//Printing Routing TAble
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

// MAtch the url with the routing table
$url = $_SERVER['QUERY_STRING'] ; 

if ($router->match($url)) {
    echo '<pre>';
    var_dump ($router->getMatch());
    echo '</pre>';
}
else {
  echo " Sorry no route defined for this url :-)";
}
	