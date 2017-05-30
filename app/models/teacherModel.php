<?php

/**
 * Teacher Model
 *
 * Create Database interaction Methods for Student section
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
class TeacherModel extends BaseModel
{
    public $registry, $actionData;
    public function __construct ($table, Registry $registry)
	{
	$this->registry = $registry;
	
	}
	
	
}
 
 