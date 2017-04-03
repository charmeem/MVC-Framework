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
    $view = new ViewManager('home','layouts');

    //Defining properties on the fly using __set() magic function
    $view->student_section =APP_PATH . '/app/controllers/studentController.php';
    $view->teacher_section = APP_PATH . '/app/controllers/teacherController.php';
    $view->course_section = APP_PATH . '/app/controllers/courseController.php';
    $view->css_path = APP_URI . '/public/css/main.css';

    $view->render();
}
}