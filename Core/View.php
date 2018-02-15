<?php

namespace Core;

/**
 * Home class
 *
 */
class View
{
    /**
     * Function render
	 *
	 * Render html by an action through controllers
	 *
	 * @return void
     */
	 public static function render($view, $args = [])
	 {
	     extract($args, EXTR_SKIP);
	     $file ="../App/Views/$view";
		 
		 if(is_readable($file)){
		     require $file;
		 } else {
		     echo "$file not found";
		 }
	    
	 }
	 
	 /**
	  * Render view template using Twig
	  *
	  * @param string $template  view file to be loaded
	  * @param array $args Associative array of data to display in the view
	  *
	  * @return void
	  */
	  public static function renderTemplate($template, $args = [])
	  {
	      static $twig = null;
		  
		  if ($twig === null) {
		      $loader = new \Twig_Loader_Filesystem('../App/Views');
			  $twig = new \Twig_Environment($loader);
		  }
		  
		  echo $twig->render($template, $args);
		  
	  }
	 
}