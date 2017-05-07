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
    * Execute a query string
    * @param String the query
    * @return void
    */
	public function executeQuery($queryStr)
	{
	    $result = $this->connection->query($queryStr);
		if (!$result) echo 'Connection Fail' . mysqli_connect_error() . "<br><br>";
		}
	
	/**
    * Close the active connection
    * @return void
    */
	public function close()
	{
	    $this->connection->close();
	}

/*	
public function add($roll_number, $first_name, $last_name, $major, $semester, $grade)
	  {
	      
	      $sql = 'INSERT INTO student (roll_number, first_name, last_name, major, semester, grade) VALUES(?, ?, ?, ?, ?, ?)';
	      // $connection = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME);
		
  	      $stmt = $this->connection->prepare($sql);
		  
		  $stmt->bind_param('ssssss', $roll_number, $first_name, $last_name, $major, $semester, $grade );
		  
		  $result = "Data has been submitted succesfully with: ". $stmt->insert_id;
		  $stmt->execute();
		  $stmt->close();
		  $connection->close();
		  
		  return array(
		  'student_id' => $result, 
		  );
	  }
	*/
	
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
     *
    public function sanitizeData( $data )
    {
    	return $this->connection->real_escape_string( $data );
    }
	*/
    
}