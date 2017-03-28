<?php

class SGNoticeHandler
{
	public function run()
	{
		$this->checkTimeoutError();
		$this->checkMigrationError();
		$this->checkRestoreNotWritableError();
		$this->checkLiteSpeedWarning();
	}

	private function checkTimeoutError()
	{
		if (SGConfig::get('SG_EXCEPTION_TIMEOUT_ERROR')) {
			SGNotice::getInstance()->addNoticeFromTemplate('timeout_error', SG_NOTICE_ERROR, true);
		}
	}

	private function checkMigrationError()
	{
		if (SGConfig::get('SG_BACKUP_SHOW_MIGRATION_ERROR')) {
			SGNotice::getInstance()->addNoticeFromTemplate('migration_error', SG_NOTICE_ERROR, true);
		}
	}

	private function checkRestoreNotWritableError()
	{
		if (SGConfig::get('SG_BACKUP_SHOW_NOT_WRITABLE_ERROR')) {
			SGNotice::getInstance()->addNoticeFromTemplate('restore_notwritable_error', SG_NOTICE_ERROR, true);
		}
	}

	private function checkLiteSpeedWarning()
	{
		$server = '';
		if (isset($_SERVER['SERVER_SOFTWARE'])) {
			$server = strtolower($_SERVER['SERVER_SOFTWARE']);
		}

		//check if LiteSpeed server is running
		if (strpos($server, 'litespeed') !== false) {
			$htaccessContent = '';
			if (is_readable(ABSPATH.'.htaccess')) {
				$htaccessContent = @file_get_contents(ABSPATH.'.htaccess');
				if (!$htaccessContent) {
					$htaccessContent = '';
				}
			}

			if (!$htaccessContent || !preg_match('/noabort/i', $htaccessContent)) {
				SGNotice::getInstance()->addNoticeFromTemplate('litespeed_warning', SG_NOTICE_WARNING);
			}
		}
	}
}
