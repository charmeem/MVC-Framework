<?php 

namespace Core;

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
		 //var_dump($this->routes);
		     //Comparing url request with the reg_exp of routes listed in routing table 
             if (preg_match($route, $url, $matches)) {	
			 //var_dump($matches);
			     //creating parameter array of match array 
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
	 * dispatch function
	 * creating controller class and execute actions
	 *
	 * @param string $url  The request url
	 *
	 */  
	 public function dispatch($url)
	 { 
	     $url = $this->removeQueryStringVariable($url);
	     if ( $this->match($url)) {
		     //extracting controller name from stored parameters
			 $controller = $this->params['controller'];
			 $controller = $this->convertToStudlyCase($controller);
			 $controller = "App\Controllers\\$controller"; // Adding namespace
			 //create controller class
			 if(class_exists ( $controller ) ) {
			     $controller_object = new $controller($this->params); //passing route params to BaseController constructor
				 $action = $this->params['action'];
				 $action = $this->convertToCamelCase($action);
			     // check if action method exists and is not private
				 if(is_callable([$controller_object, $action])) {
				     //Execute action method
					 $controller_object->$action();
				     
				 } else {
				     echo (" Action method ' " . $action . "' does not exists in " . $controller ." controller class " );
				 }
		     } else {
			     echo " Controller class does not exists ";
			 }
	     
		 }else {
		     echo "No route matched";
			// TRying to route all mismatch to home page
			//$home = new App\Controllers\Home();
			//$home->index();
		 }
    }	
	/**
	 * Function convertToStudlycase
	 * converts action strings to studlyCase and removes hypen
	 *
	 * @param string $string to convert
	 *
	 * @return string
	 */
	protected function convertToStudlyCase($string)
	{
	  return str_replace(' ', '', ucwords(str_replace('-', ' ', $string )));  
	}
	 
	/**
	 * Fuction convertToCamelCase
	 * converts action strings to camelCase and removes hypen
	 *
	 * @param string $string to convert
	 *
	 * @return string
	 */
	protected function convertToCamelCase($string)
	{
	    return lcfirst($this->convertToStudlyCase($string));
	}
	
	/**
	 * Function removeQueryStringVariable
	 *
	 */
	 protected function removeQueryStringVariable($url)
	 {
	     if ( $url != '' ) {
		     $parts = explode ('&', $url, 2);
		     if (strpos($parts[0], '=') === false) {
		         $url = $parts[0];
		     } else {
			     $url = '';
			 }
		 }
		 return $url;
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