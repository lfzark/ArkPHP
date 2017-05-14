<?php

define ( 'IS_WIN', strstr ( PHP_OS, 'WIN' ) ? 1 : 0 );

define ( 'DS', DIRECTORY_SEPARATOR );

define ( 'URL_DS', '/' );	

define ( 'SITE_NAME', 'blog' );

if ( SITE_NAME != ''){
	define('SITE_URL', 'http://'.$_SERVER['SERVER_NAME'].($_SERVER["SERVER_PORT"]!=80?':'.$_SERVER["SERVER_PORT"]:"").URL_DS.SITE_NAME);
}
else {
	define('SITE_URL', 'http://'.$_SERVER['SERVER_NAME'].($_SERVER["SERVER_PORT"]!=80?':'.$_SERVER["SERVER_PORT"]:""));
}



global $application_name;

$framework_path = 'framework';  //写框架目录

if(!isset($application_name)){
	$application_name = 'app';  //这里设置应用目录
}



// The PHP file extension
// this global constant is deprecated.

define ( 'EXT', '.php' );
define ( 'CLASS_EXT', '.class.php' );
define ( 'INC_EXT', '.inc.php' );

define ( 'BASE_PATH', dirname ( __FILE__ ).DS.'..' );




if(!defined("INDEX_PAGE")){
  //定义入口文件　2016.10.18
	define ( 'INDEX_PAGE', basename($_SERVER['SCRIPT_NAME']));
}



// Path to the framework folder
$framework_path = str_replace ( '\\', DS, BASE_PATH ) . DS . 'framework/';

if (is_dir ( $framework_path )) {
	define ( 'FRAMEWORK_PATH', $framework_path );
} else {
	exit ( 'Your framework folder path does not appear to be set correctly' );
}


$application_path = str_replace ( '\\', DS, BASE_PATH ) . DS . $application_name . DS;


if (is_dir ( $application_path )) {

	define ( 'APP_PATH', $application_path );

} else {
	exit ( 'Your application folder path does not appear to be set correctly. ' );
}

define ( 'PUBLIC_PATH', SITE_URL. DS .$application_name . DS . 'public' );

define ( 'ACTION_URL', SITE_URL. URL_DS. INDEX_PAGE );

define ( 'SELF', pathinfo ( __FILE__, PATHINFO_BASENAME ) );
//////////////////////
//define ( 'BASEPATH', str_replace ( "\\", "/", $framework_path ) );
//////////////////

define('SYS_PLUGIN',FRAMEWORK_PATH.DS.'plugins'. DS);
define('APP_PLUGIN',APP_PATH.DS.'plugins'. DS);

define ( 'TPL_DIR', APP_PATH . 'templates/' );
define ( 'TPL_C_DIR', APP_PATH . 'templates_c/' );
define ( 'CACHE', APP_PATH . 'cache/' );

define ( 'SIMPLE_LOG_ROOT', APP_PATH . 'logs/' );
require_once (FRAMEWORK_PATH . '/core/libs/SimpleLogger.php');

//TODO SET SYSVAR.XML

//echo $_SERVER["REQUEST_METHOD"];
//echo "http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"].'app/public';
//echo 'REQUEST_URI:'.$_SERVER["REQUEST_URI"].'<br/>';
define("ACTION_PATH","http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]);
//echo 'ACTION_PATH:'.ACTION_PATH.'<br/>';
//echo "http".(0?"s":"")."://".$_SERVER['HTTP_HOST'];

define ( 'MODULE_DIR', APP_PATH . 'controllers/' );

set_include_path(MODULE_DIR);
spl_autoload_extensions(EXT);
spl_autoload_register();


//载入Ark框架的主文件

require_once FRAMEWORK_PATH . 'core/ArkCore.php';
?>


