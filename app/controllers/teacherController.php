<?php
/**
 * Teacher Controller Class
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class TeacherController extends BaseController
{

/**
* constructor
*
* @return boolean TRUE
*/
public function __construct($controller_name, $options, $dbase)
{
    parent::__construct($controller_name, $options, $dbase);
}	 


/**
* Loads and outputs the view's markup
*
* @return void
*/
public function handleController($controller_name, $options, $dbase)
{
    $view = new ViewManager($class_name, $options);
    $view->render();
}
}