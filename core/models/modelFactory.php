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
public function __construct()
{
    //$this->name = $name;   
}

/**
 * Create Model Object
 *
 */
public function modelName($name, $table, $registry)
{
    $cName = $name . "Model";
	return new $cName( $table, $registry);
}
}
 
