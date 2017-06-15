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
 
 class BaseController
{
    private $controller_name, $actions, $view, $model;
    private	$listAllData,$searchData, $editData, $deleteData, $updateData, $addData;
    
 	/**
      * Constructor
      *
      * @param $options array Options for the view
      * @return void
      */
      public function __construct( $controller_name, $options, $registry, $view )
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
          $this->view = $view;
		  if (!is_array($options)) {
              throw new Exception("No options were supplied for the room.");
          }
          
		  // generating table name from controller_name
	      $this->table = lcfirst($controller_name);
		  
		  
		  
		
	   }
	  
    
/**
* Create and route to the associated Model
*
* Loads and outputs the view's markup based on the action
*
* I have applied 3 View Techniques:
*  1. viewManager
*  2. templateManager 
*  3. using include and php vars . See 'listAll' routine 
*
* @return void
*/
public function handleController($controller_name, $options, $registry, $model)
{
    // If only controller in URI is specified
    if (empty($options)) {
	    
	    /* Adding action properties (URI) for view Form submission( utilizing __set function in viewManager)
	     * to be processed again in index.php
		 /* e.g. 'http://localhost/webapp/student/search' */
	    foreach ($this->actions as $key=>$value) { 
	    $this->view->{$this->actions[$key]} = APP_URI. '/' . lcfirst($controller_name) . '/' . $key;
	} 
	// example output: $view->$add = APP_URI./Student/add;  add is the var defined in action attribute of student.php
	
	//render view file, render action view when form submit buttons pressed
	$this->view->render();
	
	} else {
	    // Action is also specified 
	    //Generate Action View result from form submit action above
		if (array_key_exists($options[0],$this->actions)){
		    
			/**
			 *Create Model object using model factory e.g. object of class 'StudentModel'
			 *
			 * Modification: I have removed STATIC from Factory
			 * as used dependency injection instead of STATIC.
			 * Reason is STATIC methods cannot be MOCKED in PHUNIT tests AND
			 * furthermore singleton requirement for database interface already implemented in 'registry' Class
             *
			 */ 
        	// Moving next line to index.php for more clear dependency injection
			//$model = $factory->modelName($controller_name, $this->table, $registry);
            
			//Taken from URI, directing to action method in Base Model Class and execute it in the database e.g. add(), query()
			$cache = $model->{$this->actions[$options[0]]}($this->table, $this->actionData[$options[0]]);
			
			// Not efficient coding..replaced by next lines..
			/*
			switch ($options[0])
			{
			case  'add':
                $this-> addAction();
                break;
			case  'listAll':
                $this-> listAction($cache, $this->model);
                break;
			case 'search':
                $this->searchAction($cache,$this->model);
                break;
            case 'edit':
                $this->editAction($cache,$this->model);
                break;
            case 'update':
                $this->updateAction($cache,$this->model);
                break;
            case 'delete':
                $this->deleteAction();
                break;
            }
			*/
	        
			$getAction = $options[0].'Action';
			return $this->$getAction($cache,$model);
					
	    } else {
		    throw new exception("invalid action");
		}
	}
}

/**
 * Creating Add View using Template Tags. cache query method not used here..
 * @return void
 */
private function addAction ()
{			
    // adding tags from form $_POST inputs
	$this->registry->getObject('template')->getPage()->addTag($this->columns[0], $this->addData[$this->columns[0]]);
	$this->registry->getObject('template')->getPage()->addTag($this->columns[1], $this->addData[$this->columns[1]]);
	
	//Reading and storing the template file in content variable
	$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/add.php');
	
	// replacing tags in template file with tags , and rendering the view
    $this->registry->getObject('template')->parseOutput();
    print $this->registry->getObject('template')->getPage()->getContent();
	return true;
}

/**
 * Generating listAll View WITHOUT templating, adopting Simple approach 
 * 
 * @return void
 */
private function listAllAction ($cache, $model)
{
	$list = array();
	
	// Iterating through query result rows one by one and storing it into an array 
	while ($ntags = $model->result($cache)) {
	    $list[] = $ntags;
	}
	
	// Call view manager to handle view function
	$this->view->setData('list', $list);
	$this->view->setData('column', $this->columns);
	$this->view->nrender(lcfirst($this->controller_name), $this->options[0]);
		//exit();	
}


/**
 * Creating Search View using Template. Cache query method used here
 * @return 
 */
private function searchAction ($cache, $model)
{
			// using Template for view rendering
			$searchPhrase = $model->sanitize($this->searchData);

			// adding search phrase to tags array from Form $_POST input
			$this->registry->getObject('template')->getPage()->addTag('query', $searchPhrase);
			
			
			// Fetching search query array from database via mOdel 
			$ntags = $model->result($cache);
			
			if($ntags == null) {
			    echo "Sorry the searched element does not exists";
				exit;
			} 	
			//Adding this fetched result to the tags array
	        foreach ($ntags as $k => $v){
			$this->registry->getObject('template')->getPage()->addTag($k, $v);
			}
			//read and store template file in content variable
			$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/search.php');
			
			// replace template contents with tags, and render the view
            $this->registry->getObject('template')->parseOutput();
            
			print $this->registry->getObject('template')->getPage()->getContent();
			
          //  exit();
}

/**
 * Creating Edit View using Template
 * @return 
 */
private function editAction ($cache, $model)
{
    // Fetching search query array from database via mOdel 
	$ntags = $model->result($cache);
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
	//exit();
}

/**
 * Creating Update View using Template
 * @return 
 */
private function updateAction ($cache, $model)
{			
    	// Following code Failing as UPDATE return TRUE instead of object
/*
    // Fetching search query array from database via mOdel 
	$ntags = $this->model->result($cache);

	
	if($ntags == null) {
	    echo "Soy the searched element does not exists";
		exit;
	} 	
	//Adding this fetched result to the tags array
	foreach ($ntags as $k => $v){
		$this->registry->getObject('template')->getPage()->addTag($k, $v);
	}
*/
	$this->registry->getObject('template')->getPage()->addTag('message', 'has been successfully updated');
    
	//store template file to content variable
	$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/update.php');
			
	// replace tags with db content, and render the view
    $this->registry->getObject('template')->parseOutput();
            
	print $this->registry->getObject('template')->getPage()->getContent();
	//exit();
}

private function deleteAction ()
{			
    // adding tags 
	//store template file to content variable
	$this->registry->getObject('template')->buildFromTemplates(APP_PATH . '/app/views/' . $this->table .'/delete.php');
	// replace tags with db content, and render the view
    $this->registry->getObject('template')->parseOutput();
    print $this->registry->getObject('template')->getPage()->getContent();
}


}