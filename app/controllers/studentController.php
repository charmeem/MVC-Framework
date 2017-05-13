<?php
/**
 * Student Controller
 *
 * Function: Create Model Object ( done in Parent 'BaseControlelr' class)
 * Call model methods( database drivers), Render Views( or templates)
 *           
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class StudentController extends BaseController
{
   public $roll_number, $fname, $lname, $semester, $major, $grade, $controller_name;
   public $addData = array(), $table, $action, $test, $searchData = array();
   public $columns =array('roll_number',
	                        'first_name',
							'last_name',
							'semester',
							'major',
							'grade'
							);
	
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct( $controller_name, $options, $dbase )
{
    // Passing arguments from child to parent's constructor ..
    parent::__construct($controller_name, $options, $dbase);
	
	
	
    	
	/**
	 * Creating Query variables for database Drivers
	 * addData array from action form output(student table columns) as input for INSERT
	 */
	if(isset($_POST['roll_number'])) 
	    $this->addData['roll_number'] =$_POST['roll_number'];
	if(isset($_POST['first_name'])) 
		$this->addData['first_name'] = $_POST['first_name'];
	if(isset($_POST['last_name'])) 
		$this->addData['last_name'] = $_POST['last_name'];
	if(isset($_POST['semester'])) 
		$this->addData['semester'] = $_POST['semester'];
	if(isset($_POST['major'])) 
		$this->addData['major'] = $_POST['major'];
	if(isset($_POST['grade'])) 
		$this->addData['grade'] = $_POST['grade'];

	// Search Data
    if(isset($_POST['student_search'])) 
	    $this->searchData['search'] = $_POST['student_search'];
		$this->searchData['columns'] = $this->columns;  // to be used in SELECT query command
	
	// Creating Action Data array to be used to call db actions and queries from BaseControlelr class
        $this->actionData = array (
		   'add'    => $this->addData,
		   'search' => $this->searchData,
		   );
		  
	
}


}