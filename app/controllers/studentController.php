<?php
/**
 * Generates output for the Home view
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class StudentController extends BaseController
{
/**
* Overrides the parent constructor to avoid an error
*
* @return bool TRUE
*/
public function __construct($options)
{
    parent::__construct($options);
	
	//$this->model = new StudentModel;
	
	// Check for actions submitted in URI 'add_student_action' below
	// and associate a method to it to be called later in handleAction.
	$this->actions = array(
	    'add' => 'add_student',
		'edit' => 'edit_student',
		);
	if (array_key_exists($options[0], $this->actions)) {
	    $this->handleAction($options[0]);  // Defined in baseController.php file
		exit;
	}	
	}
protected function add_student()
{
    // Leaving Model classes for a while only testing views/controllers
	$output = 'add';
	return $output;
	}
/**
* Loads and outputs the view's markup
*
* @return void
*/
public function outputView( )
{
    $view = new ViewManager('student');
	
	//variable for view file, utilizing __set function
	$view->add_student_action =APP_URI. '\student\add';
    
	//render view file
	$view->render();
}
}