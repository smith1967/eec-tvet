<?php
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *     1. development
 *     2. testing
 *     3. production
 */
define('ENVIRONMENT', '2');
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case '1':
			error_reporting(E_ALL);
                        break;
	
		case '2':
                    	error_reporting(E_ALL & ~E_NOTICE);
                        break;
		case '3':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}
$php_version = '5.4.0';
if(version_compare($php_version, PHP_VERSION)>=0){
    header("Content-type: text/html; charset=utf-8");
    die('โปรแกรมนี้ต้องการ PHP ตั้งแต่เวอร์ชั่น '.$php_version.' เป็นต้นไป , เวอร์ชั่นที่ติดตั้ง: ' . PHP_VERSION . "\n");
}
session_start();
///////////////////////////////////////////////////////////
$site_url = 'http://localhost/eec-tvet/';  // เปลี่ยนตาม site ที่ติดตั้ง
//$fis_year = '2556';         
$site_title = 'EEC TVET';
$site_subtitle = 'EEC TVET';
$version = 'Eec-Tvet-0.1';
$project = "EEC-TVET";
$auhtor = "it-dev VEC";
$author_email = "smith@cstc.ac.th";
///////////////////////////////////////////////////////////
define('SITE_URL', $site_url);
define('INC_PATH', str_replace('\\','/',dirname(__FILE__)).'/');
define('BASE_PATH', dirname(INC_PATH).'/');
define('APP_PATH', BASE_PATH.'app/');
define('LIB_PATH', BASE_PATH.'library/');
define('UPLOAD_DIR', BASE_PATH . 'upload/');
//var_dump(LIB_PATH);
//die();
define('APP_URL', SITE_URL.'app/');
// database parameter
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = '';
$charset = 'utf8';
$salt='';	//  salt password
//GRANT ALL PRIVILEGES ON dve2017.* TO dvt@localhost IDENTIFIED BY 'dvt2017!';
/*--- Database connect ---*/

$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
//$mysqli = new mysqli($host, $user, $password, $database);
if (mysqli_connect_error())
{    
    header("Content-type: text/html; charset=utf-8");
    die("!เกิดข้อผิดพลาด : " . mysqli_connect_error());
}
mysqli_set_charset($db, $charset);
//$mysqli->set_charset($charset);
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    // set utf8
    $conn->exec("SET CHARACTER SET utf8");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("Content-type: text/html; charset=utf-8");
    echo $sql . "<br>" . $e->getMessage();
    die();
}
//if($conn){
//    echo "Connect database";
//    die();
//}

require_once LIB_PATH.'/functions.php';

