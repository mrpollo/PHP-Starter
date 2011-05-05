<?php
require_once (DBW . DS . 'library' . DS . 'extenders' . DS . 'db' . DS . 'db.php');
$iopts = parse_ini_file('config' . DS . 'app.ini', true);
print_r( $iopts );
/*
	Array
	(
	    [production] => Array
	        (
	            [database.host] => 1
	            [database.user] => 1
	            [database.pass] => 1
	            [database.db] => 1
	        )

	    [development] => Array
	        (
	            [database.host] => 1
	            [database.user] => 1
	            [database.pass] => 1
	            [database.db] => 1
	        )
	)
*/
#new getset($iopts['database']['user'], $iopts['database']['pass'], $iopts['database']['host']);
$db = new db($iopts['database']['user'], $iopts['database']['pass'], $iopts['database']['host'], $iopts['database']['db']);
#require_once (ROOT . DS . 'config' . DS . 'config.php');
#require_once (ROOT . DS . 'library' . DS . 'shared.php');
/*
START SESSION
CONNECT DB
URL
ROUTE TO CONTROLLER
WRITE DEFAULT CONTROLLER TO LOAD TEMPLATE AND VIEW

include template
	view will render out of default view class
*/