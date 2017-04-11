<?php

/**
 * Student Model
 *
 * Create Dtabase interaction Methods for Student section
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
 class StudentModel extends baseModel
 {
     //public $sql;
     /**
      * Saves a new Student Data to the database
      *
      * @param $roll_number $first_name $last_name $major $semester $grade
      * @return array An array of data about the student
      */
	  public function addStudent($roll_number, $first_name, $last_name, $major, $semester, $grade)
	  {
	      $sql = 'INSERT INTO student (roll_number, first_name, last_name, major, semester, grade) VALUES(?, ?, ?, ?, ?, ?)';
	      $stmt = self::$mysqli->prepare($sql);
		  
		  $stmt->bind_param('ssssss', $roll_number, $first_name, $last_name, $major, $semester, $grade );
		  
		  $result = "Data has been submitted succesfully with: ". $stmt->insert_id;
		  $stmt->execute();
		  $stmt->close();
		  self::$mysqli->close();
		  
		  return array(
		  'student_id' => $result, 
		  );
	  }
}
 
 