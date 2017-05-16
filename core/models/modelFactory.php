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
	public $registry, $addData, $table;
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
public static function modelName($name, $addData, $table, $registry)
{
    $cName = $name . "Model";
	return new $cName($name, $addData, $table, $registry);
}
}
 
