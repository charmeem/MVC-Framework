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
     protected  $connection;
       
	public function __construct()
	{
	 
	// 1. Creating Connection to Mysql database using Singleton pattern in 
	     // Database.php and mysqli_driver.php
          
         // 2. Creating Connection to  Mongo database using Singleton pattern 
         //$mongo = Mongo::getInstance()->connect();
	 
	     // 3. Creating Connection to  Microsoft Sql database using Singleton pattern 
         //$mssql = Mss::getInstance()->connect();
	 }
	
	
	
}