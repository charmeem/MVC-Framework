<?php
/**
 * Course Controller Class
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class CourseController extends BaseController
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
public function handleController( $class_name, $options)
{
    $view = new ViewManager($class_name, $options);
    $view->render();
}
}