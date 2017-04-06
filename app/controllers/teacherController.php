<?php
/**
 * Generates output for the Home view
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class TeacherController extends BaseController
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
    $view = new ViewManager('teacher');
    $view->render();
}
}