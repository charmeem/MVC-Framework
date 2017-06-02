<?php

use PHPUnit\Framework\TestCase;
require 'baseController.php' ;

/** 
 * @covers listAll
 */
class baseControllerTest extends TestCase
{
    public function testHandleController()
	{
        $actions = 'add';
		$zero = 0;
	
	// arguments variable and objects definition for handleController function
	$controller_name = 'Student';
	$options = array('add');  // action 
	$registry = new stdClass();  // definig registry as an empty object
	$view = new stdClass();
	$pageObject = new stdClass();
	
	$getObject = 'getObject';
	$getPage = 'getPage';
	$addTag = 'addTag';
    
	// Mocking class of object $model	
    $model = $this->getMockBuilder('StudentModel')
	              ->setMethods([$actions])
	              ->getMock();
    $model->expects($this->any())
	      ->method($actions)
	      ->with('student')
		  ->will($this->returnValue($zero));
	
	/**
	 * Chain of objects and method calls : BaseController->addAction 
	 * Note: LAST IN CHAIN DEFINED FIRST
	 */
	$page = $this->getMockBuilder('Page')
	              ->setMethods([$addTag])
	              ->getMock();
            $page->expects($this->once())
	             ->method($addTag)
	             ->withAnyParameters()
	             ->will($this->returnValue(true));
	
	$template = $this->getMockBuilder('Template')
	              ->setMethods([$getPage])
	              ->getMock();
            $template->expects($this->any())
	              ->method($getPage)
				  //->with('dummy')
	              ->will($this->returnValue($page));
	
	$registry = $this->getMockBuilder('Registry')
	              ->setMethods([$getObject])
	              ->getMock();
            $registry->expects($this->any())
	              ->method($getObject)
	             //->with('template')
		         ->will($this->returnValue($template));
	
	
	
	
	// Create class object and call function under test
	$class = new BaseController($controller_name, $options, $registry, $view);

	$result = $class->handleController($controller_name, $options, $registry, $model);
	$this->assertTrue($result);
	
	} 
	 
}