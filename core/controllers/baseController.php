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
     /**
      * Constructor
      *
      * @param $options array Options for the view
      * @return void
      */
      public function __construct( $options )
      {
          if (!is_array($options)) {
              throw new Exception("No options were supplied for the room.");
          }
      }
	  
	 
     /**
      * Load view's markup'
      *
      * @return void
      */
     abstract public function handleController($class_name, $options);
 }