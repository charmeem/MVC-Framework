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
		              'name' => 'Muhamamd Mubashir Mufti',
					  'profession' => 'Software Developer']
		 );
		 */
		 
		View::renderTemplate('Home/index.php', [
		              'student_section' => '/webapp/student',
					  'teacher_section' => 'Software Developer',
					  'course_section'  => '',
                      'css_path'        => '../../../public/css/home.css'					  ]
		 );
	 }
	 
}