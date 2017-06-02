<?php
/**
 * Teacher Controller
 *
 * Function: Create Model Object ( done in Parent 'BaseControlelr' class)
 * Call model methods( database drivers), Render Views( or templates)
 *           
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

class TeacherController extends BaseController
{
   //public $roll_number, $fname, $lname, $semester, $major, $grade, $controller_name;

   public $addData = array(), $table, $action, $test, $searchData = array();
  
  public $columns =array(   
                            'first_name',
							'last_name',
							'education',
							'sub1',
							'sub2',
							'sub3'
							);
	
/**
* constructor
*
* @return boolean TRUE
*/
public function __construct( $controller_name, $options, $registry, $view )
{
    // Passing arguments from child to parent's constructor ..
    parent::__construct($controller_name, $options, $registry, $view);
	
	
	// Add Data array : from action form output(student table columns) as input for INSERT
	foreach($this->columns as $column){
	    if(isset($_POST[$column])) 
	    $this->addData[$column] =$_POST[$column];
	}	
	
	//lIstAll database
	if(isset($options[1]))
	$this->listAllData['orderby'] = $options[1];
	$this->listAllData['columns'] = $this->columns;
	
	// Search Data array 
    if(isset($_POST['teacher_search'])) 
	    $this->searchData['search'] = $_POST['teacher_search'];
		$this->searchData['columns'] = $this->columns;  // to be used in SELECT query command
	
	// Edit Data: this is parameter part of URI ( controler/action/parameter)
	if(isset($options[1]))
	   $this->editData['search'] = $options[1];
	   // option[1] obtained from action attr. of search form which will be used as
       // condition in Edit( actualy search) query	   
	   
	   $this->editData['columns'] = $this->columns;
	
	// Update Data: this is parameter part of URI ( controler/action/parameter)
	if(isset($options[1]))
	   $this->updateData['update'] = $options[1];
	   // option[1] obtained from action attr. of edit form which will be used as
       // condition in UPDATE query	   
	   
	   $this->updateData['columns'] = $this->columns;
	
	// Delete Data:this is parameter part of URI ( controler/action/parameter)
	if(isset($options[1]))
       $this->deleteData['delete'] = $options[1];
	   // option[1] is value of roll_number obtained from action attr. of search form
       //  which will be used as condition in DELETE query	   
	   
	   $this->deleteData['columns'] = $this->columns;
	
	// Creating Action Data array to be used to call db actions and queries from BaseControlelr class
        $this->actionData = array (
		   'add'    => $this->addData,
		   'listAll' => $this->listAllData,
		   'search' => $this->searchData,
		   'edit' => $this->editData,
		   'delete' => $this->deleteData,
		   'update' => $this->updateData,
		   );
	
		
}


}