<?php

date_default_timezone_set('Asia/Shanghai');
defined('APP_PATH') || define('APP_PATH', realpath(dirname(__FILE__) . '/app'));

set_include_path(implode(PATH_SEPARATOR, array(realpath(APP_PATH . '/../lib'), realpath(APP_PATH), get_include_path())));

//exit(APP_PATH . '/controllers/' . 'index.php');

$requestedURI = $_SERVER["REQUEST_URI"];
$count = strpos($requestedURI, "?");
if($count){
	$requestedURI = substr($requestedURI, 0, $count);
}
$requestParams = explode('/', trim($requestedURI, "/"));
$controller = empty($requestParams[0]) ? 'index': $requestParams[0];
$path = APP_PATH . '/controllers/' . $controller . '.php';
if(file_exists($path)){
	require_once $path;
}else{
	exit("WRONG CONTROLLER");
}