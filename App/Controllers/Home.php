<?php

namespace App\Controllers;
use \Core\View;
/**
 * Home class
 *
 */
class Home extends \Core\BaseController
{
    /**
     * Function index
	 *
	 * @return void
     */
	 public function index()
	 {
	    echo "You are calling index action  within Home Controller";
		View::render('Home/index.php');
	 }
	 
}