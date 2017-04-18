<?php
/**
 * Controller Interface Class
 *
 * Interface Class implemented by BaseController class and other children
 *
 * @package    interface
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */
 
 interface ControllerInterface 
 {
     public function handleController($class_name, $options);
 }