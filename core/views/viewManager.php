<?php
/**
 * An abstract Class
 *
 * An abstract Core Controller Class setting template for the child controller Classes
 *
 * @package    abstract
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class ViewManager
{
    protected $view,
	          $dir,
              $vars = array();
/**
* Initializes the view
*
* @param $view array The view slug
* @return void
*/
public function __construct( $view=NULL, $dir )
{
    if (!$view) {
    throw new Exception("No view argument was supplied.");
    }
    $this->view = $view;
	$this->dir = $dir;
	
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
* Loads and parses the selected view file with markup
*
* @return mixed A string of markup if $print is TRUE or void
*/
public function render()
{
    // Converts $vars array to individual variables
    extract($this->vars);
    // Checks to make sure the requested view exists
    $view_filepath = APP_PATH . '/app/views/' . $this->dir . '/' . $this->view . '.php';
    if (!file_exists($view_filepath)) {
        throw new Exception("That view file doesn't exist.");
    }
    require_once $view_filepath;
}
}