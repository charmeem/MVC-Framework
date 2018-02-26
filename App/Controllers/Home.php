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
     * Default Action function
	 * Render default Home View
	 * @return void
     */
	 public function index()
	 {
	    /*
		echo "You are calling index action  within Home Controller";
		View::render('Home/index.php', [
		              'name' => 'Muhammad Mubashir Mufti',
					  'profession' => 'Software Developer']
		 );
		 */
		$public_path = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
		$css_path = $public_path . '/css/home.css';
		
		View::renderTemplate('Home/index.html', [
		              'student_section' => '/webapp/student', //matches routing table where only student controller and no action given in url, see index.php
					  'teacher_section' => 'Software Developer',
					  'course_section'  => '',
                      'css_path'        => $css_path
    				  ]
		 );
	 }
	 
}