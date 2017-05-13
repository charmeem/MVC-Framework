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
    public $dbase, $actionData;
    public function __construct ($controller_name, $addData, $table, Registry $dbase)
	{
	$this->dbase = $dbase;
	$this->columns = $addData;
	//var_dump($addData);
	
	// preparing Search query variable.
	// ideally should be part of database driver but since we made database driver generic
	// we are including controller specific query variables here
	//$sql = "SELECT $addData from $table WHERE first_name like '%{$searchPhrase}'";
	
	// preparing List query variable
	
	}
	
	
}
 
 