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
    public $registry;
	public function __construct()
	{
    }

	 /**
	* Insert query string into database
	*
	* @return void
	*/
	public function add ($table, $addData) 
	{
	    $this->registry->getObject('mysqlidb')->insert($table, $addData);
    }
	
    /**
	* Search query string from database
	*
	* @return void
	*/
	public function search ($table, $searchData)
	{
	    // Build query command 
		$sql = $this->registry->getObject('mysqlidb')->searchQuery($table, $searchData); 
		$cache = $this->registry->getObject('mysqlidb')->cacheQuery($sql);
		return $cache;
		
	}
	
	/**
	* List records from database
	*
	* @return void
	*/
	public function listAll ($table, $listData)
	{
	    $sql = $this->registry->getObject('mysqlidb')->listQuery($table); 
		}
	/**
	* Sanitize data
	*
	* @return void
	*/
    public function sanitize ($searchData)
    {
	    return $this->registry->getObject('mysqlidb')->sanitizeData($searchData['search']);
    }

    /**
	* Sanitize data
	*
	* @return void
	*/
    public function result($cache)
    {
	    return $this->registry->getObject('mysqlidb')->resultsFromCache( $cache );
	}	
}