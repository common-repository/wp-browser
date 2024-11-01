<?php
	if ($_POST['modcoder_get_cache_ver'] != 'get_ver') die();
	$cache_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'cache.dat';
	if (file_exists($cache_path)) {
		$cachever = unserialize(file_get_contents($cache_path));
		$cachever = strval($cachever['cache_version']);
	} else {
		$cachever = '0';	
	}
	$s = '';
	foreach($_COOKIE as $key=>$val) $s .= '___'.$key.'___';
	$s = (sizeof(explode('wordpress_logged_in_', $s)) > 1)?('1'):('0'); 
	die($cachever.'|'.$s);
	// у залогиненного юзера есть такой параметр в массиве $_COOKIE
	// wordpress_logged_in_80c494f724c6dd2d8754c732c15f8273 = admin|1309874401|93586fe1f475fdaef6608594e5d6b8b7
?>