<?php

/**
 * Model Factory
 *
 * Creates Model objects
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class ModelFactory
{
    protected $options;
	public $dbase, $actionData, $table;
/**
 * constructor
 *
 * @return boolean TRUE
 */
public function __construct($name)
{
    $this->name = $name;   
}

/**
 * Create Model Object
 *
 */
public static function modelName($name, $actionData, $table, $dbase)
{
    $cName = $name . "Model";
	return new $cName($name, $actionData, $table, $dbase);
}
}
 
