<?php


//-----------------------------------------------------------------------------
// Defining CONSTANTS
//-----------------------------------------------------------------------------

// Server path to this app (C:/Program Files (x86)/Apache Software Foundation/Apache2.2/htdocs/webapp)
define('APP_PATH', dirname(__FILE__));

// App folder, relative from web root (/webapp)
define('APP_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

// URL path to the app (i.e. http://localhost/webapp)
define('APP_URI',('http://' . $_SERVER['SERVER_NAME'] . APP_FOLDER));

require_once APP_PATH . '/app/config.php' ;

require_once APP_PATH . '/core/controllers/baseController.php' ;
require_once APP_PATH . '/core/models/baseModel.php' ;
require_once APP_PATH . '/core/controllers/controllerFactory.php' ;
require_once APP_PATH . '/app/controllers/HomeController.php' ;
require_once APP_PATH . '/app/controllers/studentController.php' ;
require_once APP_PATH . '/app/controllers/teacherController.php' ;
require_once APP_PATH . '/app/controllers/courseController.php' ;
require_once APP_PATH . '/app/models/studentModel.php' ;
//require_once APP_PATH . '/app/models/teacherModel.php' ;
//require_once APP_PATH . '/app/models/courseModel.php' ;



require_once APP_PATH . '/core/views/viewManager.php' ;

//-----------------------------------------------------------------------------
// Loads and processes view data
//-----------------------------------------------------------------------------

// Parses the URI
$uri_array = parse_uri();

//var_dump($uri_array);
//Q? How do we avoid calling 'get_controller_classname' multiple times

$class_name = get_controller_classname($uri_array);

//Default home controller
if (empty($class_name)) {
    $class_name = 'Home';
	}

$options = $uri_array; // controller is dropped and $uri_array left now with actions and parametrs, 
                       //due to reference argument passed to get_controller_classname

// Generate Controller Objects 
$controller = ControllerFactory::controllerName($class_name, $options);

$controller->handleController($class_name, $options);

//-----------------------------------------------------------------------------
// Function declarations
//-----------------------------------------------------------------------------
/**
* Breaks the URI into an array at the slashes
*
* @return array The broken up URI
*/
function parse_uri( )
{
    // Removes any subfolders in which the app is installed
    $real_uri = preg_replace(
    '~^'.APP_FOLDER.'~',
    '',
    $_SERVER['REQUEST_URI'],
    1
    );
	//Converting URI into array
    $uri_array = explode('/', $real_uri);

    // If the first element is empty, get rid of it
    if (empty($uri_array[0])) {
        array_shift($uri_array);
    }
    // If the last element is empty, get rid of it
    if (empty($uri_array[count($uri_array)-1])) {
        array_pop($uri_array);
    }
	//var_dump($uri_array);
    return $uri_array;
}

/**
* Determines the controller name using the first element of the URI array
*
* @param $uri_array array The broken up URI
* @return string The controller classname
*/
function get_controller_classname( &$uri_array )
{
    $controller = array_shift($uri_array);
    return ucfirst($controller);
}
/**
* Removes unwanted slashes (except in the protocol)
*
* @param $dirty_path string The path to check for unwanted slashes
* @return string The cleaned path
*/
function remove_unwanted_slashes( $dirty_path )
{
return preg_replace('~(?<!:)//~', '/', $dirty_path);
}
