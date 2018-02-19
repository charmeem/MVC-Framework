<?php

/**
 * Front-controller
 * 
 * Main Functions: 
 * 1.Takes route from the request URI using 'QUERY_STRING'
 * 2. Matche that route with the routing table built using Router Class
 * 3. Extract Controller and Actions from the route
 * 5. Each controller has its own Class whereas actions are the methods within that class
 * 6. Classes are loaded using auto-load function
 * 
 */

/**
 * Twig
 */
 require_once dirname(__dir__) . '/vendor/autoload.php';
 //Twig_Autoloader::register();
 
 
/**
 * Auto-loader function
 *
 * Saves us from requiring all the classes at once like in mvc1 version 
 * 
 * Automatically called whenever a new class object is created
 *
 * Loads Classes without explicitly requiring them
 *
 */
 
spl_autoload_register( function ($class) {

    $root = dirname (__dir__);  // Parent directory of public directory
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	//var_dump($file);
	if ( is_readable ( $file )) {
	    require $file ;         // requiring class file
	}
	
});


/**
 * Routing
 *
 * Controller and Action are derived here from the Request URL
 * for this a routing table with variable format using reg. expression built here
 * 
 */

$router = new Core\Router(); // Always use class name with namespace

/**
 * Creating static and Variable Routing Table
 *
 * route name, array [controller name, action]
 *
 */

 // Fixed routes with default actions
$router->add( ''        , ['controller' => 'Home'    , 'action' => 'index']); 
$router->add( 'student' , ['controller' => 'Students', 'action' => 'index']);
$router->add( 'teacher' , ['controller' => 'Teachers', 'action' => 'index']);
$router->add( 'course'  , ['controller' => 'Courses' , 'action' => 'index' ]);

// Variable routes
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

// Adding a variable route for my e-commerce site
// Example: product/abaya/34/add-to-cart
$router->add('{controller}/{item}/{id:\d+}/{action}');

//Printing Routing TAble
/*
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';
*/

// MAtch the url with the routing table
$url = $_SERVER['QUERY_STRING'] ; 

/*
if ($router->match($url)) {
    echo '<pre>';
    var_dump ($router->getMatch());
    echo '</pre>';
}
else {
  echo " Sorry no route defined for this url :-)";
}
*/

//Execute Controller Action in Router dispatch method
$router->dispatch($url);

	
/**
 * NOTES
 *
 */
//echo ' Requested URL is equal to "' . $_SERVER['QUERY_STRING'] .'"';
//echo ' Request URI is equal to "' . $_SERVER['REQUEST_URI'] .'"';