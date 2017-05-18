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
      public function __construct( $controller_name, $options, $registry )
      {
	      //Define an array for CRUD Actions : move to some common place later !!
	      $this->actions = array(
	       'add' => 'add',
	       'listAll' => 'listAll',
	       'edit' => 'edit',
	       'delete' => 'delete',
	       'search' => 'search',
		   'update' => 'update',
	       );
		  
           
	      $this->controller_name = $controller_name;
		  $this->options = $options;
		  $this->registry = $registry;

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
public function handleController($controller_name, $options, $registry)
{
    // If only controller in URI, no action
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
		    
			//Don't want model or db functions for 'edit' action
			
	        // Create Model object using model factory e.g. object of class 'StudentModel'
        	$this->model = ModelFactory::modelName($controller_name, $this->addData, $this->table, $registry);
            // Taken from URI, go to action method in Base Model Class and execute it in the database e.g. add(), query()
			$cache = $this->model->{$this->actions[$options[0]]}($this->table, $this->actionData[$options[0]]);
			
			
			switch ($options[0])
			{
			case  'add':
                $this-> addAction();
                break;
            case 'search':
                $this->searchAction($cache,$this->model);
                break;
            case 'edit':
                $this->editAction($cache,$this->model);
                break;
            
			}
			
	    } else {
		    throw new exception("invalid action");
		}
	}
}

/**
 * Creating Add View using Template
 * @return void
 */
private function addAction ()
{			
    // adding tags 
	$this->registry->getObject('template')->getPage()->addTag('f_name', $this->addData['first_name']);
	$this->registry->getObject('template')->getPage()->addTag('l_name', $this->addData['last_name']);
	//store template file to content variable
	$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/add.php');
	// replace tags with db content, and render the view
    $this->registry->getObject('template')->parseOutput();
    print $this->registry->getObject('template')->getPage()->getContent();

}

/**
 * Creating Search View using Template
 * @return void
 */
private function searchAction ($cache, $model)
{
			// using Template for view rendering
			$searchPhrase = $this->model->sanitize($this->searchData);
			// adding search phrase to tags array
			$this->registry->getObject('template')->getPage()->addTag('query', $searchPhrase);
			
			
			// Fetching search query array from database via mOdel 
			$ntags = $this->model->result($cache);
			if($ntags == null) {
			    echo "Sorry the searched element does not exists";
				exit;
			} 	
			//Adding this fetched result to the tags array
	        foreach ($ntags as $k => $v){
			$this->registry->getObject('template')->getPage()->addTag($k, $v);
			}
			var_dump($ntags);
			//store template file to content variable
			$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/search.php');
			
			// replace tags with db content, and render the view
            $this->registry->getObject('template')->parseOutput();
            
			print $this->registry->getObject('template')->getPage()->getContent();
			
            exit();
}

/**
 * Creating Edit View using Template
 * @return void
 */
private function editAction ($cache, $model)
{
    // Fetching search query array from database via mOdel 
	$ntags = $this->model->result($cache);
	if($ntags == null) {
	    echo "Sorry the searched element does not exists";
		exit;
	} 	
	//Adding this fetched result to the tags array
	foreach ($ntags as $k => $v){
		$this->registry->getObject('template')->getPage()->addTag($k, $v);
	}

    //store template file to content variable
	$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/edit.php');
			
	// replace tags with db content, and render the view
    $this->registry->getObject('template')->parseOutput();
            
	print $this->registry->getObject('template')->getPage()->getContent();
	exit();	
}


}