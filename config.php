<?php

define('BASE_URL', 	   'remotemysql.com/payroll/');
define('REG_URL', 	   'http://localhost:7882/payroll/registration/');
define('COMPANY_NAME', 'Online Payroll Management System');
define('QR_URL', 	   'remotemysql.com/payroll/QRCodeAttendance/');

// MySQL Database Details
// define('DB_SERVER', 	'localhost');
// define('DB_USER', 		'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 		'opms');
// define('DB_PREFIX', 	'wy_');

define('DB_SERVER', 	'remotemysql.com');
define('DB_USER', 		'cqfh9GWair');
define('DB_PASSWORD', '8dFYmmTZ42');
define('DB_NAME', 		'cqfh9GWair');
define('DB_PREFIX', 	'wy_');

// Email Constant
define("PHPMAILER_SMTPSECURE", 	 "ssl");
define("PHPMAILER_HOST", 		     "WEB");
define("PHPMAILER_PORT", 		     "PORT_NUMBER");
define("PHPMAILER_USERNAME", 	   "EMAIL_ADDR");
define("PHPMAILER_PASSWORD", 	   "PASSWORD");
define("PHPMAILER_FROM", 		     "EMAIL_ADDR");
define("PHPMAILER_FROMNAME", 	   "Online Payroll Management System");
define("PHPMAILER_WORDWRAP", 	   "50");

ini_set("display_errors", 0);

date_default_timezone_set("Asia/Manila");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

session_start();


// *** FOR PDF, please get the mpdf60 folder and paste it under project directory and uncomment the below 2 lines of code ***

//**include(dirname(__FILE__) . '/mpdf60/mpdf.php');
//**$mpdf = new mPDF();


include(dirname(__FILE__) . '/functions.php');

if ( isset($_SESSION['Admin_ID']) && isset($_SESSION['Login_Type']) )
  $userData = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);
else
  $userData = array();
