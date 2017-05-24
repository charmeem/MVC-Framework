<?php
/**
 * View Handler
 *
 * Class to generate Views by rendering Markup file
 *
 * @package    viewManager
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class ViewManager
{
    public $data = array();
    protected $controller_name,
	          $css_path,
			  $options = array(),
              $vars = array();
/**
* Initializes the view
*
* @param $controller_name $options 
*
*/
public function __construct( $controller_name, $options)
{
    if (!$controller_name) {
    throw new Exception("No class argument was supplied.");
    }
    $this->controller_name = $controller_name;
	$this->options = $options;
}
/**
* Collect dynamic properties and stores into $vars array
*
* @param $key string The variable name
* @param $var string The variable value
* @return void
*/
public function __set( $key, $var )
{
    $this->vars[$key] = $var;
}

/**
* Loads and parses the selected view file with Markup
*
*/
public function render()
{
    // Converts $vars array to individual variables
    extract($this->vars);
	//var_dump($toto);
	
    //Generate Controller View 
	if (empty($this->options)) {
    $view_filepath = APP_PATH . '/app/views/' . $this->controller_name . '/' . $this->controller_name . '.php';
    } else {
	//Generate Action View
	$view_filepath = APP_PATH . '/app/views/' . $this->controller_name . '/' . $this->options[0] . '.php';
    }

	//Sets the path to the stylesheet for home page
	$css_path = APP_URI . '/public/css/main.css';
 
 if (!file_exists($view_filepath)) {
        throw new Exception("That view file doesn't exist.");
    }
    require_once $view_filepath;
}

/**
 * setting variables to be used in view
 */
public function setData($var, $data)
{
    $this->data[$var] = $data;
}

/**
 * Rendering  view
 */
public function nrender($controller, $action)
{
    $css_path = APP_URI . '/public/css/' . $action. '.css';
    $this->setData('CSSPath', $css_path);
    $data = $this->data;
	$path = APP_PATH . '/app/views/' . $controller .'/' . $action. '.php';
    include($path);

}

}
