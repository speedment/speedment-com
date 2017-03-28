<?php
require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_LIB_PATH.'SGAuthClient.php');

if (backupGuardIsAjax()) {
	$auth = SGAuthClient::getInstance();
	if ($auth->logout()) {
		SGConfig::set('SG_LICENSE_CHECK_TS', 0, true);
		SGConfig::set('SG_LOGGED_USER', '', true);
		die('0');
	}

	die('1');
}
