<?php
/**
 * Create generic database interaction methods
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
abstract class baseModel
{
    public static $mysqli;
    /**
     * Create mysqli connection to MySQL
     *
     * @return boolen TRUE
     */

    public function __construct() 
	{
	    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	    self::$mysqli = new mysqli(
	    DB_HOST, DB_USER, DB_PSW, DB_NAME
		);
	    if (mysqli_connect_errno()) {
	        echo 'Connect Fail' . mysqli_connect_error();
		    exit;
	    }
    }
}