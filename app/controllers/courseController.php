<?php
/**
 * Course Controller Class
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class CourseController extends BaseController
{

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
* Loads and outputs the view's markup
*
* @return void
*/
public function handleController($controller_name, $options, $registry)
{
    $view = new ViewManager($class_name, $options);
    $view->render();
}
}