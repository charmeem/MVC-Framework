<?php

namespace App\Controllers;
use \Core\View;
use \App\Models\Student;

/**
 * defining Students class as controller
 * functions as actions
 *
 */
class Students extends \Core\BaseController
{

    /**
     * Default Action function
	 * render default student page view
	 * Called from Home Controller
	 *
	 * @return void
     */
	 public function index()
	 {
	    /*
		echo "You are calling index action  within Student Controller";
		View::render('Home/index.php', [
		              'name' => 'Muhamamd Mubashir Mufti',
					  'profession' => 'Software Developer']
		 );
		 */
		 
		View::renderTemplate('Student/index.html', [
		              'listall' => '/webapp/students/list-all', //webapp/controller/action
					  'add' => '/webapp/students/list-all']
		 );
	 }
	 
    /**
     * Function listStudents
	 * List students (R of CRUD)
     *
	 * @return void
     */
	 public function listAll()
	 {
	    //echo "You are calling listAll action method within Students Controller Class";
		
		$lists = Student::listAll();   //rendering Model, student static method
		
		View::renderTemplate('Student/listall.html', [             // rendering View
		              'list' => $lists
    	  ]);
		
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
		     htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
		 
	 }
}