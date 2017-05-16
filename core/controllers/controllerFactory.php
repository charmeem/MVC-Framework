<?php

/**
 * Controller Factory
 *
 * Generates controller objects
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class ControllerFactory
{
    protected $options;
	
/**
 * constructor
 *
 * @return boolean TRUE
 */
public static function controllerName($controller_name, $options, $registry)
{
    $cName = $controller_name . "Controller";
	return new $cName($controller_name, $options, $registry);
}
}
 
