<?php
/**
 * Default Home Controller
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class HomeController extends BaseController
{
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct( $options )
{
//print_r(get_declared_classes());

    if (!is_array($options)) {
        throw new Exception("No options were supplied for the room.");
    }
}
	 
/**
* Loads and outputs view's markup
*
* @return void
*/
public function handleController($class_name, $options )
{
    $view = new ViewManager($class_name, $options);

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