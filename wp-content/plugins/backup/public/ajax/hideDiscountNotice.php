<?php
require_once(dirname(__FILE__).'/../boot.php');

if(backupGuardIsAjax()) {

	$discountNoticeInfoJson = SGConfig::get('SG_HIDE_DISCOUNT_NOTICE');

	if ($discountNoticeInfoJson) {
		$discountNoticeInfo = json_decode($discountNoticeInfoJson, true);
		$discountNoticeInfo['dissmissCount'] += 1;
		$discountNoticeInfo['lastDismiss'] = time();

	}
	else {
		$discountNoticeInfo = array(
			"dissmissCount" => 1,
			"lastDismiss" => time()
		);
	}

	SGConfig::set('SG_HIDE_DISCOUNT_NOTICE', json_encode($discountNoticeInfo));
}
