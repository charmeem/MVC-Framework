<?php

/**
 * Student Model
 *
 * Create Dtabase interaction Methods for Student section
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
 class StudentModel extends BaseModel
 {
    protected  $connection;
     public function __construct ()
	 {
	$connection = MysqliDriver::getInstance()->connect();
	//var_dump($connection);
		  
         }
	 
	 
	 //public $sql;
     /**
      * Saves a new Student Data to the database
      *
      * @param $roll_number $first_name $last_name $major $semester $grade
      * @return array An array of data about the student
      */
	  
}
 
 