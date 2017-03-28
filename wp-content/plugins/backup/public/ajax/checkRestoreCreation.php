<?php

require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_BACKUP_PATH.'SGBackup.php');

if (backupGuardIsAjax()) {
	$timeout = 10; //in sec
	while ($timeout != 0) {
		sleep(1);
		$timeout--;
		$created = SGConfig::get('SG_RUNNING_ACTION', true);

		if ($created) {
			$runningActions = SGBackup::getRunningActions();
			if ($runningActions) {
				$actionId = $runningActions[0]['id'];
				die(json_encode(array(
					'status' => 0,
					'external_enabled' => SGExternalRestore::isEnabled()?1:0,
					'external_url' => SGExternalRestore::getInstance()->getDestinationFileUrl()
				)));
			}
		}
	}

	die('{"status":1}');
}
