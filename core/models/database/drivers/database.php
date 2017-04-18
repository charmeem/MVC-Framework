<?php
/**
 * A Database access class
 *
 * Based on Registry pattern 
 * 
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class Database
{
    
    protected static $_singleton = null;
	
	// array of objects stored within
	private $objects = array();
	
    protected function __construct()
    {}
/**
 * Static function, creates instance of its own class
 *
 * This function when called from Model class will create mysqli Connection
 *
 * Singleton Pattern is used to avoid multiple objects of database connections
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
	
public final static function getInstance()
{
    if(null === static::$_singleton) {
    static::$_singleton = new static();
	}
	return static::$_singleton;
}

// Creating and storing object(with singleton instance as argument) in $objects array.
// I will mainly use this to instantiate database drivers and calling its methods
public function storeObject($object, $key)
{
    self::objects[$key] = new $object( self::$singleton);
}

// Get an object from the $objects array stored earlier
public function getObject($key)
{
   if (is_object (self::$objects[$key])) {
       return self::$objects[$key];
	}
}

public function connect() {}
// More functions to follow....
}
