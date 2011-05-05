<?php	

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('DBW', '..');

//$url = $_GET['url'];
try {
	require_once (DBW . DS . 'application' . DS . 'bootstrap.php');
} catch (Exception $exception) {
	echo '<html><body><center>'
		. 'An exception occured while bootstrapping the application.'
		. '<br /><br />' . $exception->getMessage() . '<br />'
		. '<div align="left">Stack Trace:'
		. '<pre>' . $exception->getTraceAsString() . '</pre></div>'
	 	. '</center></body></html>';
	exit(1);
}