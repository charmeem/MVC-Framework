<?php

/**
 * Student Model
 *
 * Create Database interaction Methods for Student section
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
class StudentModel extends BaseModel
{
    public $dbase;
    public function __construct (Database $dbase)
	{
	$this->dbase = $dbase;
	    }
	
	
}
 
 