<?php
require_once(dirname(__FILE__).'/../boot.php');

if(backupGuardIsAjax() && count($_POST)) {
	if ($_POST['notice'] == SG_NOTICE_EXECUTION_TIMEOUT) {
		SGConfig::set('SG_EXCEPTION_TIMEOUT_ERROR', '0');
	}

	if ($_POST['notice'] == SG_NOTICE_MIGRATION_ERROR) {
		SGConfig::set('SG_BACKUP_SHOW_MIGRATION_ERROR', '0');
	}

	if ($_POST['notice'] == SG_NOTICE_NOT_WRITABLE_ERROR) {
		SGConfig::set('SG_BACKUP_SHOW_NOT_WRITABLE_ERROR', '0');
	}
}
