<?php
require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_LIB_PATH.'SGAuthClient.php');

if (backupGuardIsAjax() && count($_POST)) {
	$productId = $_POST['productId'];
	$url = site_url();

	$auth = SGAuthClient::getInstance();
	$error = '';
	if ($auth->linkUrlToProduct($url, $productId, $error)) {
		die('0');
	}

	die('"'.$error.'"');
}
