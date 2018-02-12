<?php 

namespace Core;

/**
 * BaseController class
 *
 * an abstract class to pass route parameters to all controllers
 *
 */
 
abstract class BaseController 
{
    /**
     * Route parameters
     * 
	 * @var array
     */
    protected $route_params = [] ;
	
	
	/** 
	 * Function constructor 
	 * 
	 * @param $route_params
	 *
	 * @return void
	 */
	public function __construct($route_params) 
    {
	     $this->route_params = $route_params;   
	}

}