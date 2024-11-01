<?php
	if ($_POST['modcoder'] != 'modcoder_cat_page_request') die();
	$user = intval($_POST['user']);
	$category = $_POST['category'];
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
	$fcache = dirname(__FILE__).DIRECTORY_SEPARATOR.$cver.'_'.$category.'_'.$page.'.pag';
	if (file_exists($fcache) && $user == 0) {
		$cache = file_get_contents($fcache);
	} else {
		$cache = $error_msg;
	}
	die($cache);
?>