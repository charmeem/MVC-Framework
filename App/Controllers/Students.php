<?php

namespace App\Controllers;

/**
 * Students class
 *
 */
class Students extends \Core\BaseController
{
    /**
     * Function listStudents
	 * List students (R of CRUD)
     *
	 * @return void
     */
	 public function listAll()
	 {
	    echo "You are calling listAll action method within Students Controller Class";
	 }
	 
	 /**
     * Function addStudents
	 * add students (C of CRUD)
     *
	 * @return void
     */
	 public function addStudent()
	 {
	    echo "You are calling addStudent action of Students controller class";
	 }
	 
	 /**
     * Function editStudent
	 * add students (C of CRUD)
     *
	 * @return void
     */
	 public function editStudent()
	 {
	     echo " You are calling edit action of student controller";
		 echo '<p> Route Parameters : <pre>' . 
		     htmlspecialchars(print_r($route_params, true)) . '</pre></p>';
		 
	 }
}