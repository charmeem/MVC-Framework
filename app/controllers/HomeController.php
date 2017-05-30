<?php
/**
 * Default Home Controller
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class HomeController extends BaseController
{
 private $controller_name;
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct($controller_name, $options, $registry)
{
    parent::__construct($controller_name, $options, $registry);
}	 
/**
* Loads and outputs view's markup
*
* @return void
*/
public function handleController($controller_name, $options, $registry, ModelFactory $factory)
{
    $view = new ViewManager($controller_name, $options);

    //Defining properties on the fly using __set() magic function
	
	// Hardcoding variables used in <a> links in home view file.
	// A new URi will be created and when this link is selected the new controller 
	// will be selected after parsing this new URI
    $view->student_section =APP_URI. '\student';
    $view->teacher_section = APP_URI . '\teacher';
    $view->course_section = APP_URI . '\course';

	$view->render();
}

}