<?php
/**
 * Generates output for the Home view
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class HomeController extends BaseController
{
/**
* Overrides the parent constructor to avoid an error
*
* @return boolean TRUE
*/
public function __construct( )
{
    return TRUE;
}

/**
* Loads and outputs the view's markup
*
* @return void
*/
public function outputView( )
{
    $view = new ViewManager('home');

    //Defining properties on the fly using __set() magic function
	
	// Hardcoding variables used in <a> links in home view file.
    $view->student_section =APP_URI. '\student';
    $view->teacher_section = APP_URI . '\teacher';
    $view->course_section = APP_URI . '\course';

	//$view->student_section = $this->handle_form_submission();
	// make a controller factory 
	//$controller = ControllerFactory::className('student');
	//$controller = new StudentController($options);
	//$controller->outputView();
    
    $view->render();
}

/*
protected function handle_form_submission( )
{
header('Location: ' . APP_URI . '/student', FALSE);
exit;
}
*/
}