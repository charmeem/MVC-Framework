<?php
/**
 * Student Controller
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class StudentController extends BaseController
{
   public $roll_number, $fname, $lname, $semester, $major, $grade, $controller_name;
   public $addData = array(), $table, $action, $test;
   
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct( $controller_name, $options)
{
    parent::__construct($options);
	
    if (!is_array($options)) {
        throw new Exception("No options were supplied for the room.");
    }
	
	/**
	 * generating table name from controller_name
	 */
	$this->table = lcfirst($controller_name);
	
	/**
	 * Creating array from action form input(student table columns)
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
	    
		    
	//Define an array for CRUD Actions : move to some common place later !!
	$this->actions = array(
	'add' => 'add',
	'list' => 'list',
	'edit' => 'edit',
	'delete' => 'delete',
	);
	
}

/**
* Loads and outputs the view's markup
*
* @return void
*/
public function handleController($controller_name, $options, $dbase )
{
    if (empty($options)) {
	// Generate initial Controller View (form inputs)
    $view = new ViewManager($controller_name, $options);
	
	//adding add action variable for student view Form submission( utilizing __set function in viewManager)
	// This will render action view when form submit button pressed
	$view->add_student_action = APP_URI. '\student\add';
    
	//render view file
	$view->render();
	
	} else {
	    //Generate Action View result from form submit action above
		if (array_key_exists($options[0],$this->actions)){
		
	        // Create Model object using model factory e.g. object of class 'StudentModel'
        	$this->model = ModelFactory::modelName('Student', $dbase);

			// Go to Model Class based on action
			$this->model->{$this->actions[$options[0]]}($this->table, $this->addData);
			
			//render view
		    $view = new ViewManager($controller_name, $options);
	        $view->render();
	    }
	}
}


}