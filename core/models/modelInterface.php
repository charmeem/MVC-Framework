<?php
/**
 * Model interface class
 *
 * Define interface for Database class 
 * 
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
interface ModelInterface
{
    
abstract function connect();
abstract function executeQuery($queryStr);
abstract function close();
abstract function insert($table, $addData);
abstract function edit();
abstract function delete();

}
