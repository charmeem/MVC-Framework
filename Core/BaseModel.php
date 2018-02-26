<?php

namespace Core;
use PDO;
use \App\Config;

/**
 * abstract BaseModel class
 * 
 * Here PDO instance is created
 * since only single instance of PDO is needed we use abstract class
 *
 */
abstract class BaseModel
{
    /**
     * get db connection
     *
     */    
    protected static function getDB()
	{
        static $db = null;
	    if ($db === null) {
	        try {
            $dsn = 'mysql:host=' . Config::HOST_NAME . ';dbname=' . Config::DB_NAME ;
			$db  = new PDO($dsn, Config::USER_NAME, Config::PASS);

			return $db;    
		    }
		    catch(PDOException $e) {
		         echo $e->getMessage();
		    }
	    }	
	}
}