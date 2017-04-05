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
* @return bool TRUE
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
	// make a controller factory 
    //$view->student_section =APP_URI. '\app\views\student\student.php';
	$view->student_section = handle_form_submission();
	//$controller = ControllerFactory::className('student');
	//$controller = new StudentController($options);
	//$controller->outputView();
    $view->teacher_section = APP_URI . '\app\controllers\teacherController.php';
    $view->course_section = APP_URI . '\app\controllers\courseController.php';

    $view->render();
}

public function handle_form_submission( )
{
header('Location: ' . APP_URI . 'student');
exit;
}

}