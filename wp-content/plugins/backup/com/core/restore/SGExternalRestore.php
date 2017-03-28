<?php

abstract class SGExternalRestore
{
	private static $instance = null;

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = self::createChildInstance();
		}

		return self::$instance;
	}

	private static function createChildInstance()
	{
		$className = 'SGExternalRestore'.SG_ENV_ADAPTER;
		require_once(dirname(__FILE__).'/'.$className.'.php');
		$child = new $className();
		return $child;
	}

	protected function __construct()
	{

	}

	private function __clone()
	{

	}

	public function getSourceFilePath()
	{
		return SG_PUBLIC_PATH.'restore_'.strtolower(SG_ENV_ADAPTER).'.php';
	}

	public function getDestinationFilePath()
	{
		//get already saved restore path
		$path = SGConfig::get('SG_EXTERNAL_RESTORE_PATH', true);

		if (!$path) {
			$path = $this->getDestinationPath().SG_EXTERNAL_RESTORE_FILE;
			SGConfig::set('SG_EXTERNAL_RESTORE_PATH', $path, true);
		}

		return $path;
	}

	public function getDestinationFileUrl(&$key = '')
	{
		//we use this key to deny direct access to the file
		$key = SGConfig::get('SG_BACKUP_CURRENT_KEY', true);

		//get already saved restore url
		$url = SGConfig::get('SG_EXTERNAL_RESTORE_URL', true);

		if (!$url) {
			$url = $this->getDestinationUrl().SG_EXTERNAL_RESTORE_FILE.'?k='.$key;
			SGConfig::set('SG_EXTERNAL_RESTORE_URL', $url, true);
		}

		return $url;
	}

	public static function isEnabled()
	{
		return SGConfig::get('SG_EXTERNAL_RESTORE_ENABLED')?true:false;
	}

	protected static function setEnabled($enabled)
	{
		SGConfig::set('SG_EXTERNAL_RESTORE_ENABLED', ($enabled?1:0), true);
	}

	private function getConstants($actionId)
	{
		$key = '';
		$destinationUrl = $this->getDestinationFileUrl($key);

		$isMultisite = backupGuardIsMultisite();

		return array(
			'SG_ACTION_ID' => $actionId,
			'SG_PLUGIN_NAME' => SG_PLUGIN_NAME,
			'SG_ENV_DB_PREFIX' => SG_ENV_DB_PREFIX,
			'SG_SITE_URL' => SG_SITE_URL,
			'SG_BACKUP_SITE_URL' => SG_BACKUP_SITE_URL,
			'SG_PUBLIC_URL' => SG_PUBLIC_URL,
			'SG_BACKUP_DIRECTORY' => SG_BACKUP_DIRECTORY,
			'SG_PING_FILE_PATH' => SG_PING_FILE_PATH,
			'BG_PLUGIN_URL' => SG_PUBLIC_BACKUPS_URL,
			'BG_RESTORE_KEY' => $key,
			'BG_RESTORE_URL' => $destinationUrl,
			'BG_IS_MULTISITE' => $isMultisite,
			'SG_MISC_MIGRATABLE_TABLES' => SG_MISC_MIGRATABLE_TABLES,
			'SG_MISC_MIGRATABLE_VALUES' => SG_MISC_MIGRATABLE_VALUES,
			'SG_MULTISITE_TABLES_TO_MIGRATE' => SG_MULTISITE_TABLES_TO_MIGRATE,
			'SG_DB_NAME' => SG_DB_NAME,
			'DOMAIN_CURRENT_SITE' => defined('DOMAIN_CURRENT_SITE')?DOMAIN_CURRENT_SITE:'',
			'PATH_CURRENT_SITE' => defined('PATH_CURRENT_SITE')?PATH_CURRENT_SITE:''
		);
	}

	public function prepare($actionId)
	{
		$res = false;

		//reset everything
		self::setEnabled(false);
		SGConfig::set('SG_EXTERNAL_RESTORE_URL', '', true);
		SGConfig::set('SG_EXTERNAL_RESTORE_PATH', '', true);

		if ($this->canPrepare()) {
			$contents = @file_get_contents($this->getSourceFilePath());
			if ($contents) {
				$constants = $this->getConstants($actionId);
				$customConstants = $this->getCustomConstants();
				$allConstants = array_merge($constants, $customConstants);

				$defines = '';
				foreach ($allConstants as $key => $val) {
					$defines .= "define('$key', '$val');\n";
				}

				//put all defines inside the file
				$contents = str_replace('#SG_DYNAMIC_DEFINES#', $defines, $contents);

				//create new copy
				$res = (bool)@file_put_contents($this->getDestinationFilePath(), $contents);
			}
		}

		self::setEnabled($res);

		return $res;
	}

	public function cleanup()
	{
		if (file_exists($this->getDestinationFilePath())) {
			$actions = SGBackup::getRunningActions();
			if (empty($actions)) {
				@unlink($this->getDestinationFilePath());
			}
		}
	}

	abstract protected function canPrepare();

	abstract protected function getCustomConstants();

	abstract public function getDestinationPath();

	abstract public function getDestinationUrl();
}
