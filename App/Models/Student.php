<?php

namespace App\Models;
use PDO;

/**
 * Student Model class
 * 
 * Fetches data from database
 */
 
class Student extends \Core\BaseModel
{
     public static function listAll()
	 {
	      $db = static::getDB();  //connecting to DB by calling BAseModel class method
		  $sql= "SELECT * FROM student ORDER BY first_name";
		  //$sql= "SELECT * FROM student ORDER BY :option";
		  $stmt = $db->prepare($sql);
		  //$stmt = bindParam(':option', $option, PDO::PARAM_STR,255);
		  $stmt->execute();
		  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
		  $stmt->closeCursor();
		  
		  return $result;
		  
	 }
	 
	 
}
 