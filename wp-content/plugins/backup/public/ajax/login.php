<?php
require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_LIB_PATH.'SGAuthClient.php');

if (backupGuardIsAjax() && count($_POST)) {
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$auth = SGAuthClient::getInstance();
	if ($auth->login($email, $password)) {
		$user = $auth->getCurrentUser();
		SGConfig::set('SG_LOGGED_USER', serialize($user), true);
		die('0');
	}

	die('1');
}
