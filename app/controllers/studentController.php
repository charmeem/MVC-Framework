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
public function __construct( $controller_name, $options, $registry )
{
    // Passing arguments from child to parent's constructor ..
    parent::__construct($controller_name, $options, $registry);
	
	
	/**
	 * Creating Query variables for database Drivers
	 * addData array from action form output(student table columns) as input for INSERT
	 */
	foreach($this->columns as $column){
	    if(isset($_POST[$column])) 
	    $this->addData[$column] =$_POST[$column];
	}	
	
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