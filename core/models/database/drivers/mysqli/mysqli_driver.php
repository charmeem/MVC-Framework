<?php
/**
 * mysqli database Driver implementation
 *
 * Singelton Pattern is used to avoid multiple objects of database connections
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */;
class MysqliDriver
{
     protected static $mysqli;   
	/**
     * Create mysqli connection to MySQL
     *
     * @return boolen TRUE
    ; */

    public function connect() 
	{
	
	    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	    //self::$conn = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME );
		static::$mysqli = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME);
		
	    if (mysqli_connect_errno()) {
	        echo 'Connect Fail' . mysqli_connect_error();
		    exit;
	    }
		return static::$mysqli;
    }
	
public function add($roll_number, $first_name, $last_name, $major, $semester, $grade)
	  {
	      
	      $sql = 'INSERT INTO student (roll_number, first_name, last_name, major, semester, grade) VALUES(?, ?, ?, ?, ?, ?)';
	      // $connection = new mysqli( DB_HOST, DB_USER, DB_PSW, DB_NAME);
		
  	      $stmt = $mysqli->prepare($sql);
		  
		  $stmt->bind_param('ssssss', $roll_number, $first_name, $last_name, $major, $semester, $grade );
		  
		  $result = "Data has been submitted succesfully with: ". $stmt->insert_id;
		  $stmt->execute();
		  $stmt->close();
		  $connection->close();
		  
		  return array(
		  'student_id' => $result, 
		  );
	  }
	  
	public function edit()
	{
	    
	}
	
	public function delete()
	{
	    
	}
	
}