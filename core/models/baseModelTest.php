<?php

use PHPUnit\Framework\TestCase;
require APP_PATH . '/core/models/baseModel.php' ;

/** 
 * @covers listAll
 */
 class baseModelTest extends TestCase
 {
     private $actions;
	 
     protected function setup()
	 {
	     $this->actions = new baseModel();
	 }
	 
	 protected function tearDown()
	 {
	     $this->actions = NULL;
	 }
	 
	 public function testListAll()
	 {
	     $result = $this->actions->listAll($table, $listAllData);
		 $this->assertEquals(0, $result);
	 }

	 
}