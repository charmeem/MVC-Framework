<?php 

/**
 * Router class
 *
 */
 
class Router
{
    /**
     * Array of Routes with controller and action names
     * Also called routing table
	 * @array  $routes
     */
    protected $routes = [] ;
	
	/**
     * Array of route parameters ( controller, action etc)
     * 
	 * @array  $params
     */
    protected $params = [] ;

	/** 
	 * Add function
	 * Building Routing Table for both fixed routes as well as variable routes
	 *
	 * @param string $route  The route url
	 * @param array $params URL parameters(controllers, actions, etc)
	 *
	 */
	public function add($route, $params = [])
    {
	    //Converting $routes into regular expressions to be added 
		//to the variable routing table and to be used for matching later
	    $route = preg_replace ( '/\//', '\\/' , $route);
		$route = preg_replace ( '/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route );
		// Could not understand "([^}]" as shown below
		$route = preg_replace ( '/\{([a-z-]+):([^}]+)\}/' , '(?P<\1>\2)', $route );
        $route = '/^' . $route . '$/i' ;		
	
        $this->routes[$route] = $params;
		
    }	
	
	/**
	 * Function getRoutes
	 * Print Routing Table
	 *
	 */
	 function getRoutes()
	 {
	     return $this->routes;
	  }
	  
	/** 
	 * match function
	 * matching url with routing table
	 *
	 * @param string $url  The request url
	 *
	 */  
	public function match($url)
    {
	//var_dump($url);
	
         foreach ($this->routes as $route => $params) {
             if (preg_match($route, $url, $matches)) {	
		 	     foreach ($matches as $key => $match) {
			         if (is_string($key)) {
				         $params[$key] = $match;
				     }
			     }
			 $this->params = $params;
			 return true;
		     }
		     
         }
		 return false;
    }
    /**
	 * Function getMatch
	 * Print Matching route parameters
	 *
	 */
	 function getMatch()
	 {
	     return $this->params;
	  }	
}