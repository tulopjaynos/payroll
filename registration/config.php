<?php

define('BASE_URL',   'http://localhost:7882/payroll/registration/');

define('DB_SERVER', 	'localhost');
define('DB_USER', 		'root');
define('DB_PASSWORD', '');
define('DB_NAME', 		'opms');
define('DB_PREFIX', 	'wy_');

// define('DB_SERVER', 	'remotemysql.com');
// define('DB_USER', 		'h2RQb6NCyj');
// define('DB_PASSWORD', 'PpVEksK82S');
// define('DB_NAME', 		'h2RQb6NCyj');
// define('DB_PREFIX', 	'wy_');


error_reporting(1);

date_default_timezone_set("Asia/Manila");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

session_start();
