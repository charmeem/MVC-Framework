<?php
/**
 * mysqli database Driver implementation
 *
 * Singelton Pattern is used to avoid multiple objects of database connections
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
class MysqliDriver extends Database
{
    private $connection; 
    private $queryCache = array();
	
    public function __construct(){}	 
	/**
     * Create mysqli connection to MySQL
     *
     * @return boolen TRUE
     */

    public function connect() 
	{
	
	    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	    //self::$conn = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME );
		$this->connection = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME);
		
	    if (mysqli_connect_errno()) {
	        echo 'Connection Fail' . mysqli_connect_error();
		    exit;
	    }
		return $this->connection;
    }
	
	/**
     * Insert records into the database
     * @param String the database table
     * @param array data to insert field => value
     * @return bool
     */
	public function insert($table, $addData)
	{
	    $fields = "";
		$values = "";
		foreach ($addData as $f => $v) {
		    $fields .= "$f ,";
			$values .= (is_numeric ($v) && (intval ($v) == $v)) ? $v. ",": "'$v',";
		}
		//removing last comma ,
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
			
		$insert = "INSERT INTO $table ({$fields}) VALUES({$values})";
		
		$this->executeQuery($insert);  
		return true;
		}
	/**
	 * Search query 
	 *
	 * @return sql
	 */
	 public function searchQuery ($table, $searchData)
	 {
        // separating columns from $searchData array  	    
		$columns = $searchData['columns'];
		
		$condition = $columns[0];
    	  
	     $column = "";
		 
		 // creating comma separated string
		 foreach ($columns as $f => $v) {
		     $column .= "$v ,";
			 }
		 
         // removing training comma
	     $column = substr($column, 0, -1);
         // sanitize search input
         $searchPhrase = $this -> sanitizeData($searchData['search']);
		 
		 //EXAMPLE: "SELECT roll_number, first_name, last_name,semester, major, grade from student WHERE (roll_number like //'2' OR semester like '2')";
		
		$sql = "SELECT $column from $table WHERE (";
		
		foreach ( $columns as $index => $condition) {
		    $sql .= $condition . " LIKE " . "'%" . $searchPhrase. "%'" . " OR ";
		}
		//Removing trailing OR
		$sql = substr ($sql, 0, -3);
		
		$sql .= ")";
		
		return $sql;
		 
	}
	
	/**
	 * Update query 
	 * @return $sql
	 */
	 public function updateQuery ($table, $updateData)
	 {
        // separating columns from $updateData array  	    
		$columns = $updateData['columns'];
		$primaryKey = $columns[0];
	          
    	// sanitize search input
        $updateRecord = $this -> sanitizeData($updateData['update']);
				 
		$sql = "UPDATE " . $table . " SET ";
		
        foreach($_POST as $f => $v) {
		    $sql .=  $f . " = '{$v}' ,";
		}
    	
		// removing training comma
	     $sql = substr($sql, 0, -1);
         
		$sql .= "WHERE " . $primaryKey ." = " . "'" . $_POST[$primaryKey] . "'";
		
		return $sql;
		 
	}
	
	/**
	 * Delete record 
	 * We are not using cache query for delete and insert operation..
	 * @return 
	 */
	public function deleteQuery( $table, $deleteData )
    {
	    // Selecting roll_number(primaryKey) as condition 
		$columns = $deleteData['columns'];
		$condition = $columns[0];
    	
		//$deleteData['delete'] is parameter in URI obtained from action attribute in form
    	$sql = "DELETE FROM {$table} WHERE {$condition} =" . $deleteData['delete'];
    	$this->executeQuery( $sql );
		
		return true;
    }
        
	/**
    * Execute a query string
    * @param String the query
    * @return void
    */
	public function executeQuery($queryStr)
	{
	    $result = $this->connection->query($queryStr);
		if (!$result) echo 'Connection Fail' . mysqli_connect_error() . "<br><br>";
		}
	
	/*
    * Store a query in query cache to be used for processing
    * @param String the query
    * @return void
    */
	public function cacheQuery ($sql)
	{
	    if (!$result = $this->connection->query($sql) )
		{
		    echo 'Connection Fail' . mysqli_connect_error() . "<br><br>";
		}
		else
		{
		    $this->queryCache[] = $result;
			return count($this->queryCache) -1;
		}
	}
	
	/**
     * Get the rows from a cached query
     * @param int the query cache pointer
     * @return array the row
     */
    public function resultsFromCache( $cache_id )
    {
	    return $this->queryCache[$cache_id]->fetch_array(MYSQLI_ASSOC);
		
    }
    
	/**
	 * get rows from latest database query
     * @return array
	 */
	 public function getRows()
	 {
	     return $this->result->fetch_array(MYSQLI_ASSOC);
	 }
	 
    /**
    * Close the active connection
    * @return void
    */
	public function close()
	{
	    $this->connection->close();
	}

	
	/**
     * Sanitize data
     * @param String the data to be sanitized
     * @return String the sanitized data
     */
    public function sanitizeData( $data )
    {
    	return $this->connection->real_escape_string( $data );
    }
	
    
}