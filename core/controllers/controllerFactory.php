<?php

/**
 * Controller Factory
 *
 * Generates controller objects
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class ControllerFactory ()
{
    public function __construct()
	{
	    
	}
	public function className($name)
	{
	    $controllerName = $name . "Controller";
	    return new $controllerName();
	}
}
 
/**
* Controller Handler
*
* @return void
*/
public function controllerHandler($name)
{
    $controller = ControllerFactory::className($name);
	return $controller->outputView;
}
