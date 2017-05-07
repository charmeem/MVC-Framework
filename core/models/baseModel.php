<?php
/**
 * Generic database interaction methods
 *
 * Based on Singleton Patteren,Can be transferred later to mysli_driver class 
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class BaseModel
{
    public $dbase;
	public function __construct()
	{
    }

	 /**
	* Insert query string into database
	*
	* @return void
	*/
	public function add ($table, $addAction) 
	{
	    $this->dbase->getObject('mysqlidb')->insert($table, $addAction);
    }
	
    /**
	* Search query string from database
	*
	* @return void
	*/
	public function search ($table, $addAction)
	{
	    $this->dbase->getObject('mysqlidb')->insert($table, $addAction);
    }
	
	
}