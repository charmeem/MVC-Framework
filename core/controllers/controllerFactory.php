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
public static function controllerName($name,$options)
{
    $cName = $name . "Controller";
	return new $cName($name, $options);
}
}
 
