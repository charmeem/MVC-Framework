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
	      $db = static::getDB();  //connecting to DB by calling BaseModel class method
		  $sql= "SELECT * FROM student ORDER BY first_name";
		  //$sql= "SELECT * FROM student ORDER BY :option";
		  $stmt = $db->prepare($sql);
		  //$stmt = bindParam(':option', $option, PDO::PARAM_STR,255);
		  $stmt->execute();
		  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
		  $stmt->closeCursor();
		  
		  return $result;
		  
	 }
	 
	 public static function addStudent()
	 {
	       $studentData = array('roll_number',
	                             'first_name',
								 'last_name',
								 'semester',
								 'major',
								 'grade'
								 );
		  $newData = [];
		  $values ='';
		  $fields = '';
		  
	      $db = static::getDB();  //connecting to DB by calling BaseModel class method
		 
         foreach($studentData as $sdata){
		     if(isset($_POST[$sdata]))
			 $newData[$sdata] = htmlspecialchars($_POST[$sdata]);
		 }
		 foreach ($newData as $f => $v) {
		    $fields .= "$f ,";
			$values .= (is_numeric ($v) && (intval ($v) == $v)) ? $v. ",": "'$v',";
		}
		//removing last comma ,
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);

 		 $sql= "INSERT INTO student ({$fields}) VALUES ({$values})";
		 $stmt = $db->prepare($sql);
		 $stmt->execute();
		  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
		  $stmt->closeCursor();
		  
		  return $result;
		  
	 }
	 
	 public static function searchStudent()
	 {
	      $db = static::getDB();  //connecting to DB by calling BaseModel class method
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
 