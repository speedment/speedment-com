<?php
	require_once(dirname(__FILE__).'/../boot.php');

	file_put_contents(SG_BACKUP_DIRECTORY.SG_CHECK_RELOAD_AVAILABILITY_FILE_NAME, json_encode(array(
		'status' => 'ok'
	)));
