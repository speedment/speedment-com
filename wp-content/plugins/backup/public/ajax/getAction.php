<?php
	require_once(dirname(__FILE__).'/../boot.php');
	require_once(SG_BACKUP_PATH.'SGBackup.php');

	if(backupGuardIsAjax() && count($_POST))
	{
		@session_write_close();

		$actionId = (int)$_POST['actionId'];
		$currentAction = SGBackup::getAction($actionId);

		if($currentAction)
		{
			if($currentAction['status'] == SG_ACTION_STATUS_IN_PROGRESS_FILES || $currentAction['status'] == SG_ACTION_STATUS_IN_PROGRESS_DB)
			{
				if (!SGPing::ping()) {
					$backup = new SGBackup;
					$backup->handleExecutionTimeout($actionId);
					$currentAction = SGBackup::getAction($actionId);
				}
				die(json_encode($currentAction));
			}
			die('0');
		}
		die('0');
	}
