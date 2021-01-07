<?php

// if($_SERVER['SERVER_NAME'] == "zenluxury.vn" && $_SERVER['HTTPS'] != "on") {
//   header("HTTP/1.1 301 Moved Permanently"); 
//   header("Location: https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
//   exit();
// }

if(!defined('_lib')) die("Error");
$http = "http://";
if($_SERVER['HTTPS'] == "on")
	$http = "https://";
$config_url = $http.$_SERVER["SERVER_NAME"];

if(count(explode("//", $_SERVER['REQUEST_URI'])) > 1)
	header("Location: ".preg_replace('/\/+/i', '/', $_SERVER['REQUEST_URI']));
if(count(explode($http."www.", $config_url)) > 1) {
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: ".$http.str_replace($http."www.", "", $config_url));
	exit(1);
}

$config_url .= ":8080/caunangoto";
$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'root';
$config['database']['database'] = 'db_caunangoto';
$config['database']['password'] = '';
$config['database']['refix'] = 'tbl_';

?>
