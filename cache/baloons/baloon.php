<?php
	if ($_POST['modcoder'] != 'get_baloon') die();
	$user = intval($_POST['user']);
	$category = intval($_POST['category']);
	$page = intval($_POST['page']);
	$error_msg = 'modcoder_cache_empty';
	if (file_exists('..'.DIRECTORY_SEPARATOR.'cache.dat')) {
		$charset = unserialize(file_get_contents('..'.DIRECTORY_SEPARATOR.'cache.dat'));
		$cver = $charset['cache_version'];
		$charset = $charset['charset'];
	} else {
		$charset = 'UTF-8';
		$cver = 0;	
	}
	header("Content-Type: text/html; charset=$charset");
	$fcache = dirname(__FILE__).DIRECTORY_SEPARATOR;
	switch($user) {
		case 0  :
			$fcache .= 'all'.DIRECTORY_SEPARATOR.$cver.'_'.$category.'_'.$page.'.bal';
			if (file_exists($fcache)) {
				$cache = file_get_contents($fcache);
			} else {
				$cache = $error_msg;
			}
		break;
		default :
			$fcache .= 'registered'.DIRECTORY_SEPARATOR.$cver.'_'.$user.'.bal';
			if (file_exists($fcache)) {
				$cache = unserialize(file_get_contents($fcache));
				if (isset($cache[$category][$page])) {
					$cache = $cache[$category][$page];
				} else {
					$cache = $error_msg;
				}
			} else {
				$cache = $error_msg;
			}
		break;
	}
	die($cache);
?>