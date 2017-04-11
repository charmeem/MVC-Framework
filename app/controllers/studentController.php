<?php
/**
 * Student Controller
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class StudentController extends BaseController
{
   public $roll,
       $fname,
	   $lname,
	   $semester,
	   $major,
	   $grade; 
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct( $options )
{
    parent::__construct($options);
	
    if (!is_array($options)) {
        throw new Exception("No options were supplied for the room.");
    }
	
	$this->model = new StudentModel;
	//Generate Action View
	$this->actions = array(
	'add' => 'addStudent',
	'edit' => 'editStudent',
	'delete' => 'deleteStudent',
	);
}

/**
* Loads and outputs the view's markup
*
* @return void
*/
public function handleController($class_name, $options )
{
    if (empty($options)) {
	// Generate Controller View
    $view = new ViewManager($class_name, $options);
	
	//variable having action URIs for Form submission ( utilizing __set function in viewManager)
	$view->add_student_action = APP_URI. '\student\add';
    
	//render view file
	$view->render();
	
	} else {
	    //Generate Action View
		if (array_key_exists($options[0],$this->actions)){
            //$options[0] = $action;
			
            // CAll the method specified by the action 'e.g. addStudent'			
		    $output = $this->{$this->actions[$options[0]]}();
			
		    $view = new ViewManager($class_name, $options);
		    //variable having action URIs for Form submission ( utilizing __set function in viewManager)
	        //$view->add_student_action =APP_URI. '\student\add';
    	    //render view file
	        $view->render();
	    }
	}
}

/**
* Get Form input data and direct to the model to be stored in the database
*
* @return array about the added student info
*/
protected function addStudent()
{
    $roll = $_POST['roll_number'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$semester = $_POST['semester'];
	$major = $_POST['major'];
	$grade = $_POST['grade'];
	
	// Call addStudent method of Model class to store data
	$output = $this->model->addStudent($roll, $fname, $lname, $semester, $major, $grade );
	
	// MAke sure valid output returned
	if (is_array($output)) {
	    return $output;
	} else {
	    throw new Exception('Error Adding Student data.');
		}
}
}