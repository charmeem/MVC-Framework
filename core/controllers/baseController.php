<?php
/**
 * Abstract Controller Class
 *
 * An abstract Core Controller Class setting template for the child controller Classes
 *
 * @package    abstract
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
abstract class BaseController implements ControllerInterface
{
    private $controller_name, $actions;
    
 	/**
      * Constructor
      *
      * @param $options array Options for the view
      * @return void
      */
      public function __construct( $controller_name, $options, $dbase )
      {
	      //Define an array for CRUD Actions : move to some common place later !!
	      $this->actions = array(
	       'add' => 'add',
	       'list' => 'list',
	       'edit' => 'edit',
	       'delete' => 'delete',
	       'search' => 'search',
	       );
		  
           
	      $this->controller_name = $controller_name;
		  $this->options = $options;
		  $this->dbase = $dbase;

		  if (!is_array($options)) {
              throw new Exception("No options were supplied for the room.");
          }
          
		  // generating table name from controller_name
	      $this->table = lcfirst($controller_name);
			  
	   }
	  
    
/**
* Loads and outputs the view's markup
*
* @return void
*/
public function handleController($controller_name, $options, $dbase)

{
   
    if (empty($options)) {
	// Generate initial Controller View (form inputs)
    $view = new ViewManager($controller_name, $options);
	
	// Adding action properties (URI) for view Form submission( utilizing __set function in viewManager)
	// to be processed again in index.php
	foreach ($this->actions as $key=>$value) { 
	$view->{$this->actions[$key]} = APP_URI. '/' . $controller_name . '/' . $key;
	} 
	// example output: $view->$add = APP_URI./Student/add;  add is the var defined in action attribute of student.php
	
	//render view file, render action view when form submit buttons pressed
	$view->render();
	
	} else {
	    //Generate Action View result from form submit action above
		if (array_key_exists($options[0],$this->actions)){
		
	        // Create Model object using model factory e.g. object of class 'StudentModel'
        	$this->model = ModelFactory::modelName($controller_name, $dbase);

			// Go to action method defined in Base Model Class as result of URI action e.g. add()
			$this->model->{$this->actions[$options[0]]}($this->table, $this->actionData[$options[0]]);
			
			//render view
		    $view = new ViewManager($controller_name, $options);
	        $view->render();
	    }
	}
}

}