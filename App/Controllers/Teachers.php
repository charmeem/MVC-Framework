<?php

namespace App\Controllers;

/**
 * Students class
 *
 */
class Teachers extends \Core\BaseController
{
    /**
     * Function listAll
	 * List courses (R of CRUD)
     *
	 * @return void
     */
	 public function listAll()
	 {
	    echo "Hello From the listAll action of Teachers Controller class";
	 }
	 
	 /**
     * Function addCourse
	 * add course (C of CRUD)
     *
	 * @return void
     */
	 public function addTeacher()
	 {
	    echo "Hello From the addTeacher action of Teachers Controller class";
	 }
}