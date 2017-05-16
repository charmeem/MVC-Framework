<?php
/**
 * A Database access class
 *
 * providing abstract layer for databases 
 * 
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
abstract class Database
{
    protected function __construct(){}

    abstract function connect();
    abstract function insert($table, $addData);
    abstract function searchQuery ($table, $searchData);
	abstract function executeQuery($queryStr);
	abstract function cacheQuery($sql);
	abstract function resultsFromCache( $cache_id );
	abstract function getRows();
    abstract function close();
    abstract function edit();
    abstract function delete();
    //abstract function sanitizeData();
    abstract function sanitizeData( $data );
    protected function __clone() {
        throw new Exception('Not Allowed');
    }

    protected function __wakeup() {
        throw new Exception('Not Allowed');
    }

// More functions to follow....
}
