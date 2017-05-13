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
	 */
	 public function searchQuery ($table, $searchData)
	 {
        // separating columns from $searchData array  	    
		$columns = $searchData['columns'];
		 
	     $column = "";
		 foreach ($columns as $f => $v) {
		     $column .= "$v ,";
			 }
		 
         // removing training comma
	     $column = substr($column, 0, -1);
         
		 // sanitize search input
         $searchPhrase = $this -> sanitizeData($searchData['search']);
		 
		 $condition = $columns[0];
    	 $sql = "SELECT $column from $table WHERE $condition like '%{$searchPhrase}%'";
		 $this->cacheQuery($sql);
		 
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

	public function edit()
	{
	    
	}
	
	public function delete()
	{
	    
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