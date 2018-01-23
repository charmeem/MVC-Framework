<?php


//-----------------------------------------------------------------------------
// Defining CONSTANTS
//-----------------------------------------------------------------------------

// Server path to this file 'index.php' (C:/Program Files (x86)/Apache Software Foundation/Apache2.2/htdocs/webapp/public)
define('APP_PATH', dirname(__FILE__));


// public folder where index.php file located, relative from web root (/webapp/public)
define('INDEX_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

// creating actual application folder which is parent of public folder
$APP_FOLDER = explode('/', INDEX_FOLDER);
$APP_FOLDER = $APP_FOLDER[1];

define('APP_FOLDER', '/'. $APP_FOLDER );

//var_dump($_SERVER['REQUEST_URI']);
//var_dump($_SERVER['SCRIPT_NAME']);
//var_dump($_SERVER['SERVER_NAME']);

// URL path to the app (i.e. http://localhost/webapp)
define('APP_URI',('http://' . $_SERVER['SERVER_NAME'] . APP_FOLDER));

//var_dump(APP_FOLDER);
//var_dump(APP_PATH);
//var_dump(APP_URI);

require_once APP_PATH . '/../app/config.php' ;

require_once APP_PATH . '/../core/models/registry.php' ;
require_once APP_PATH . '/../core/controllers/controllerInterface.php' ;
require_once APP_PATH . '/../core/controllers/baseController.php' ;
require_once APP_PATH . '/../core/models/database/drivers/database.php' ;
require_once APP_PATH . '/../core/models/database/drivers/mysqli/MysqliDriver.php' ;

require_once APP_PATH . '/../core/models/modelFactory.php' ;
require_once APP_PATH . '/../core/models/baseModel.php' ;
require_once APP_PATH . '/../core/controllers/controllerFactory.php' ;
require_once APP_PATH . '/../app/controllers/HomeController.php' ;
require_once APP_PATH . '/../app/controllers/studentController.php' ;
require_once APP_PATH . '/../app/controllers/teacherController.php' ;
require_once APP_PATH . '/../app/controllers/courseController.php' ;
require_once APP_PATH . '/../app/models/studentModel.php' ;
require_once APP_PATH . '/../app/models/teacherModel.php' ;
require_once APP_PATH . '/../app/models/courseModel.php' ;

require_once APP_PATH . '/../core/views/viewManager.php' ;
require_once APP_PATH . '/../core/views/TemplateManager.php' ;

//-----------------------------------------------------------------------------
// Loads and processes view data
//-----------------------------------------------------------------------------

//Application starts here...

//Creating instance of singleton Registry
//unset($registry);
$registry = Registry::getInstance();

//Creating and Storing mysqli object
$registry->storeObject('MysqliDriver', 'mysqlidb');
//Creating and Storing PDO object
//$registry->storeObject('pdoDriver', 'pdodb');
//Creating objects for other Databases like MSSQL in future
//$registry->storeObject('MssqlDriver', 'mssqldb');

//Creating and storing template object for view
$registry->storeObject('TemplateManager', 'template');

//Creating and storing authentication object
//$registry->storeObject('authentication', 'authenticate');

//Make connection to mysql database using mysqli
$registry->getObject('mysqlidb')->connect();	

//Make connection to mysql database using PDO
//$registry->getObject('mysqlidb')->connect();	

//Make connection to other database engines like mssql database
//$registry->getObject('mssqldb')->connect();	
				
    
// Parses the URI
$uri_array = parse_uri();
//var_dump($uri_array);


// Get controller name
$controller_name = get_controller_classname($uri_array);

if (empty ($controller_name)) {
    //Go to default home controller if URI does not contain any.
    $controller_name = 'Home';
	$model = NULL;
} else {
       // create model object employing dependency injection to get the model class name
       $factory = new ModelFactory();
       $model = $factory->modelName($controller_name, lcfirst($controller_name), $registry);
    }

$options = $uri_array; // controller name is dropped and $uri_array left now with actions and parameters, 
                       //due to reference argument passed to get_controller_classname

// Generate initial Controller View (form inputs)
$view = new ViewManager($controller_name, $options);
	
					   
// Create Controller Object , employing dependency injection for $view
$controller = ControllerFactory::controllerName($controller_name, $options, $registry, $view);

  
//Go to controller to render View and interact to Model 
$controller->handleController($controller_name, $options, $registry, $model);

// Close connection to the database
//$registry->getObject('mysqlidb')->close();	

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
		//var_dump($real_uri);

	//Converting URI into array
    $uri_array = explode('/', $real_uri);

    // Q? If the first element is empty, get rid of it
    if (empty($uri_array[0])) {
        array_shift($uri_array);
    }
    // Q? If the last element is empty, get rid of it
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
