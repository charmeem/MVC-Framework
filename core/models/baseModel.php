<?php
/**
 * Generic database interaction methods
 *
 * Based on Singleton Pattern,Can be transferred later to mysli_driver class 
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
 // TO BE DONE : interface implementation to enforce names for functions like add, edit..
 
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
	* Edit record from database
	*
	* Search query done, its primary key is used as a parameter to new action which is edit
	* see search.php file, action attribute of form = edit
	*
	* @return array cache
	*/
	public function edit ($table, $editData)
	{
        $sql = $this->registry->getObject('mysqlidb')->searchQuery($table, $editData); 
	    $cache = $this->registry->getObject('mysqlidb')->cacheQuery($sql);
		return $cache;
	}
	
	/**
	* Update record in database
	*
	* Edit query done, its primary key is used as a parameter to new action which is update
	* see edit.php file, action attribute of form = update
	*
	* @return array cache
	*/
	public function update ($table, $updateData)
	{
        $sql = $this->registry->getObject('mysqlidb')->updateQuery($table, $updateData); 
	    
		// Query is stored in $cache to be utilized in Template/View in controller file
		$cache = $this->registry->getObject('mysqlidb')->cacheQuery($sql);

		return $cache;
	}
	
	/**
	* Delete record from database
	*
	* @return void
	*/
	public function delete ($table, $deleteData)
	{
        $sql = $this->registry->getObject('mysqlidb')->deleteQuery($table, $deleteData); 
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
	* Fetch rows array from cached data
	*
	* @return void
	*/
    public function result($cache)
    {
	    return $this->registry->getObject('mysqlidb')->resultsFromCache( $cache );
	}	
}