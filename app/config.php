<?php
/**
 * Configuration file
 *
 * @author     Muhammad Mubashir Mufti <mmufti@hotmail.com>
 */

// SEtup and array for constants
$config = array();
 
//---------------------------------------------------------
// Database Constants
//---------------------------------------------------------
$config['DB_HOST'] = 'localhost';
$config['DB_NAME'] = 'vuni';
$config['DB_USER'] = 'root';
$config['DB_PSW'] = '';

//---------------------------------------------------------
// Convert array into constants
//---------------------------------------------------------
foreach ($config as $constant=>$value) {
    define($constant,$value);
	}
