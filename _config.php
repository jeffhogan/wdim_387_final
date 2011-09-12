<?php 

/**
 * Configuration for geeQuest
 */

	#define directory paths
	define('SITE_DIR', dirname(__FILE__)); 
	define('PHP_LIB', SITE_DIR.'/core'); 
	define('CLASS_DIR', PHP_LIB.'/classes/');
	define('FUNCTION_DIR', PHP_LIB.'/functions/');
	define('IMG_DIR', SITE_DIR.'/images/'); 

	require_once FUNCTION_DIR.'db.php';
	require_once FUNCTION_DIR.'login_functions.php';
	require_once CLASS_DIR.'class.dashboard.php';

?>