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
    abstract function executeQuery($queryStr);
    abstract function close();
    abstract function insert($table, $addData);
    abstract function edit();
    abstract function delete();

    protected function __clone() {
        throw new Exception('Not Allowed');
    }

    protected function __wakeup() {
        throw new Exception('Not Allowed');
    }

// More functions to follow....
}
