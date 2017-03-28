<?php

require_once(SG_BACKUP_PATH.'SGIBackupDelegate.php');
require_once(SG_LIB_PATH.'SGDBState.php');
require_once(SG_LIB_PATH.'SGMysqldump.php');
require_once(SG_LIB_PATH.'SGCharsetHandler.php');
@include_once(SG_LIB_PATH.'SGMigrate.php');

class SGBackupDatabase implements SGIMysqldumpDelegate
{
	private $sgdb = null;
	private $backupFilePath = '';
	private $delegate = null;
	private $cancelled = false;
	private $nextProgressUpdate = 0;
	private $totalRowCount = 0;
	private $currentRowCount = 0;
	private $warningsFound = false;
	private $pendingStorageUploads = array();
	private $state = null;
	private $reloadStartTs = null;
	private $progressUpdateInterval;
	private $migrationAvailable = null;
	private $oldDbPrefix = null;
	private $backedUpTables = null;
	private $newTableNames = null;
	private $migrateObj = null;
	private $charsetHanlder = null;

	public function __construct()
	{
		$this->sgdb = SGDatabase::getInstance();
		$this->progressUpdateInterval = SGConfig::get('SG_ACTION_PROGRESS_UPDATE_INTERVAL');
	}

	public function setDelegate(SGIBackupDelegate $delegate)
	{
		$this->delegate = $delegate;
	}

	public function setFilePath($filePath)
	{
		$this->backupFilePath = $filePath;
	}

	public function isMigrationAvailable()
	{
		if ($this->migrationAvailable === null) {
			$this->migrationAvailable = SGBoot::isFeatureAvailable('BACKUP_WITH_MIGRATION');
		}

		return $this->migrationAvailable;
	}

	public function getOldDbPrefix()
	{
		if ($this->oldDbPrefix === null) {
			$this->oldDbPrefix = SGConfig::get('SG_OLD_DB_PREFIX');
		}

		return $this->oldDbPrefix;
	}

	public function getBackedUpTables()
	{
		if ($this->backedUpTables === null) {
			$tableNames = SGConfig::get('SG_BACKUPED_TABLES');
			if ($tableNames) {
				$tableNames = json_decode($tableNames, true);
			}
			else {
				$tableNames = array();
			}
			$this->backedUpTables = $tableNames;
		}

		return $this->backedUpTables;
	}

	public function getNewTableNames()
	{
		if ($this->newTableNames === null) {
			$oldDbPrefix = $this->getOldDbPrefix();
			$tableNames = $this->getBackedUpTables();

			$newTableNames = array();
			foreach ($tableNames as $tableName) {
				$newTableNames[] = str_replace($oldDbPrefix, SG_ENV_DB_PREFIX, $tableName);
			}
			$this->newTableNames = $newTableNames;
		}

		return $this->newTableNames;
	}

	public function getMigrateObj()
	{
		if ($this->migrateObj === null) {
			$this->migrateObj = new SGMigrate();
		}

		return $this->migrateObj;
	}

	public function getCharsetHandler()
	{
		if ($this->charsetHanlder === null) {
			$this->charsetHanlder = new SGCharsetHandler();
		}

		return $this->charsetHanlder;
	}

	public function didFindWarnings()
	{
		return $this->warningsFound;
	}

	public function setPendingStorageUploads($pendingStorageUploads)
	{
		$this->pendingStorageUploads = $pendingStorageUploads;
	}

	public function saveStateData($offset, $cursor, $inprogress, $lineSize, $backedUpTables)
	{
		$sgDBState = $this->getState();
		$token = $this->delegate->getToken();

		$sgDBState->setLineSize($lineSize);
		$sgDBState->setNumberOfEntries($this->totalRowCount);
		$sgDBState->setAction(SG_STATE_ACTION_EXPORTING_SQL);
		$sgDBState->setInprogress($inprogress);
		$sgDBState->setCursor($cursor);
		$sgDBState->setProgressCursor($this->currentRowCount);
		$sgDBState->setOffset($offset);
		$sgDBState->setToken($token);
		$sgDBState->setProgress($this->nextProgressUpdate);
		$sgDBState->setWarningsFound($this->warningsFound);
		$sgDBState->setPendingStorageUploads($this->pendingStorageUploads);
		$sgDBState->setBackedUpTables($backedUpTables);
		$sgDBState->save();
	}

	public function getState()
	{
		return $this->delegate->getState();
	}

	public function shouldReload()
	{
		$currentTime = time();

		if (($currentTime - $this->reloadStartTs) >= SG_RELOAD_TIMEOUT) {
			return true;
		}

		return false;
	}

	public function reload()
	{
		$this->delegate->reload();
	}

	public function backup($filePath)
	{
		$this->reloadStartTs = time();
		$this->state = $this->delegate->getState();

		if ($this->state && $this->state->getAction() == SG_STATE_ACTION_PREPARING_STATE_FILE) {
			SGBackupLog::writeAction('backup database', SG_BACKUP_LOG_POS_START);
			$this->resetBackupProgress();
		}
		else {
			$this->totalRowCount = $this->state->getNumberOfEntries();
			$this->currentRowCount = $this->state->getProgressCursor();
		}

		$this->backupFilePath = $filePath;

		$this->export();

		SGBackupLog::writeAction('backup database', SG_BACKUP_LOG_POS_END);
	}

	public function restore($filePath)
	{
		SGBackupLog::writeAction('restore database', SG_BACKUP_LOG_POS_START);
		$this->backupFilePath = $filePath;

		//prepare for restore (reset variables)
		$this->resetRestoreProgress();

		//import all db tables
		$this->import();

		//run migration logic
		if ($this->isMigrationAvailable()) {
			$this->processMigration();
		}

		//external restore file doesn't have the wordpress functions
		//so we cannot do anything here
		//it will finalize the restore for itself
		if (!SGExternalRestore::isEnabled()) {
			$this->finalizeRestore();
		}

		SGBackupLog::writeAction('restore database', SG_BACKUP_LOG_POS_END);
	}

	private function processMigration()
	{
		SGBackupLog::writeAction('migration', SG_BACKUP_LOG_POS_START);

		$sgMigrate = new SGMigrate($this->sgdb);

		$tables = $this->getTables();

		$oldSiteUrl = SGConfig::get('SG_OLD_SITE_URL');
		// Find and replace old urls with new ones
		$sgMigrate->migrate($oldSiteUrl, SG_SITE_URL, $tables);

		$oldDbPrefix = $this->getOldDbPrefix();

		$sgMiscMigratableValues = explode(',', SG_MISC_MIGRATABLE_VALUES);
		$dgMiscMigratebleTables = explode(',', SG_MISC_MIGRATABLE_TABLES);

		foreach ($sgMiscMigratableValues as $sgMiscMigratableValue) {
			$oldValue = $oldDbPrefix.$sgMiscMigratableValue;
			$newValue = SG_ENV_DB_PREFIX.$sgMiscMigratableValue;

			if ($newValue == $oldValue) {
				continue;
			}

			$sgMigrate->migrate($oldValue, $newValue, $dgMiscMigratebleTables);
		}

		$isMultisite = backupGuardIsMultisite();
		if ($isMultisite) {
			$tables = explode(',', SG_MULTISITE_TABLES_TO_MIGRATE);

			$oldPath = SGConfig::get('SG_MULTISITE_OLD_PATH');
			$newPath = PATH_CURRENT_SITE;
			$oldDomain = SGConfig::get('SG_MULTISITE_OLD_DOMAIN');
			$newDomain = DOMAIN_CURRENT_SITE;

			$sgMigrate->migrateMultisite($oldPath, $newPath, $tables);
			$sgMigrate->migrateMultisite($oldDomain, $newDomain, $tables);
		}

		SGBackupLog::writeAction('migration', SG_BACKUP_LOG_POS_END);
	}

	public function finalizeRestore()
	{
		if (SG_ENV_ADAPTER != SG_ENV_WORDPRESS) {
			return;
		}

		//recreate current user (to be able to login with it)
		$this->restoreCurrentUser();

		//setting the following options will tell WordPress that the db is already updated
		global $wp_db_version;
		update_option('db_version', $wp_db_version);
		update_option('db_upgraded', true);

		$upload_dir = wp_upload_dir();
		$wpUploads = $upload_dir['basedir'];
		if (!is_writable($wpUploads)) {
			update_option("upload_path", ""); //To fix invalid path inserted in db
		}
	}

	private function export()
	{
		if ($this->state && $this->state->getAction() == SG_STATE_ACTION_PREPARING_STATE_FILE) {
			if (!$this->isWritable($this->backupFilePath)) {
				throw new SGExceptionForbidden('Permission denied. File is not writable: '.$this->backupFilePath);
			}
		}

		$tablesToExclude = explode(',', SGConfig::get('SG_BACKUP_DATABASE_EXCLUDE'));

		$dump = new SGMysqldump($this->sgdb, SG_DB_NAME, 'mysql', array(
			'exclude-tables'=>$tablesToExclude,
			'skip-dump-date'=>true,
			'skip-comments'=>true,
			'skip-tz-utz'=>true,
			'add-drop-table'=>true,
			'no-autocommit'=>false,
			'single-transaction'=>false,
			'lock-tables'=>false,
			'default-character-set'=>SG_DB_CHARSET,
			'add-locks'=>false
		));

		$dump->setDelegate($this);

		$dump->start($this->backupFilePath);
	}

	private function prepareQueryToExec($query)
	{
		$query = $this->replaceInvalidCharacters($query);
		$query = $this->replaceInvalidEngineTypeInQuery($query);

		if ($this->isMigrationAvailable()) {
			$tableNames = $this->getBackedUpTables();
			$newTableNames = $this->getNewTableNames();
			$query = $this->getMigrateObj()->replaceValuesInQuery($tableNames, $newTableNames, $query);
		}

		$query = $this->getCharsetHandler()->replaceInvalidCharsets($query);

		$query = rtrim(trim($query), "/*SGEnd*/");

		return $query;
	}

	private function replaceInvalidEngineTypeInQuery($query)
	{
		if (version_compare(SG_MYSQL_VERSION, '5.1', '>=')) {
			return str_replace("TYPE=InnoDB", "ENGINE=InnoDB", $query);
		}
		else {
			return str_replace("ENGINE=InnoDB", "TYPE=InnoDB", $query);
		}
	}

	private function replaceInvalidCharacters($str)
	{
		return preg_replace('/\x00/', '', $str);;
	}

	private function import()
	{
		$fileHandle = @fopen($this->backupFilePath, 'r');
		if (!is_resource($fileHandle)) {
			throw new SGExceptionForbidden('Could not open file: '.$this->backupFilePath);
		}

		$importQuery = '';
		while (($row = @fgets($fileHandle)) !== false) {
			$importQuery .= $row;
			$trimmedRow = trim($row);

			if (strpos($trimmedRow, 'CREATE TABLE') !== false) {
				$strLength = strlen($trimmedRow);
				$strCtLength =  strlen('CREATE TABLE ');
				$length = $strLength - $strCtLength - 2;
				$tableName = substr($trimmedRow, $strCtLength, $length);

				SGBackupLog::write('Importing table: '.$tableName);
			}

			if ($trimmedRow && substr($trimmedRow, -9) == "/*SGEnd*/") {
				$importQuery = $this->prepareQueryToExec($importQuery);

				$res = $this->sgdb->execRaw($importQuery);
				if ($res===false) {
					//continue restoring database if any query fails
					//we will just show a warning inside the log

					if (isset($tableName)) {
						$this->warn('Could not import table: '.$tableName);
					}

					$this->warn('Error: '.$this->sgdb->getLastError());
				}

				$importQuery = '';
			}
			$this->currentRowCount++;
			SGPing::update();
			$this->updateProgress();
		}

		@fclose($fileHandle);
	}

	public function saveCurrentUser()
	{
		if (SG_ENV_ADAPTER != SG_ENV_WORDPRESS) {
			return;
		}

		$user = wp_get_current_user();

		$currentUser = serialize(array(
			'login' => $user->user_login,
			'pass' => $user->user_pass,
			'email' => $user->user_email,
		));

		SGConfig::set('SG_CURRENT_USER', $currentUser);
	}

	private function restoreCurrentUser()
	{
		$currentUser = SGConfig::get('SG_CURRENT_USER');
		$user = unserialize($currentUser);

		//erase user data from the config table
		SGConfig::set('SG_CURRENT_USER', '');

		//if a user is found, it means it's cache, because we have dropped wp_users already
		$cachedUser = get_user_by('login', $user['login']);
		if ($cachedUser) {
			clean_user_cache($cachedUser); //delete user from cache
		}

		//create a user (it will be a subscriber)
		$id = wp_create_user($user['login'], $user['pass'], $user['email']);
		if (is_wp_error($id)) {
			SGBackupLog::write('User not recreated: '.$id->get_error_message());
			return false; //user was not created for some reason
		}

		//get the newly created user
		$newUser = get_user_by('id', $id);

		//remove its role of subscriber
		$newUser->remove_role('subscriber');

		//add admin role
		$newUser->add_role('administrator');

		//update password to set the correct (old) password
		$this->sgdb->query(
			'UPDATE '.SG_ENV_DB_PREFIX.'users SET user_pass=%s WHERE ID=%d',
			array(
				$user['pass'],
				$id
			)
		);

		//clean cache, so new password can take effect
		clean_user_cache($newUser);

		SGBackupLog::write('User recreated: '.$user['login']);
	}

	public function warn($message)
	{
		$this->warningsFound = true;
		SGBackupLog::writeWarning($message);
	}

	public function didExportRow()
	{
		$this->currentRowCount++;
		SGPing::update();

		if ($this->updateProgress())
		{
			if ($this->delegate && $this->delegate->isCancelled())
			{
				$this->cancelled = true;
				return;
			}
		}

		if (SGBoot::isFeatureAvailable('BACKGROUND_MODE') && $this->delegate->isBackgroundMode())
		{
			SGBackgroundMode::next();
		}
	}

	public function cancel()
	{
		@unlink($this->filePath);
	}

	private function resetBackupProgress()
	{
		$this->totalRowCount = 0;
		$this->currentRowCount = 0;
		$tableNames = $this->getTables();
		foreach ($tableNames as $table)
		{
			$this->totalRowCount += $this->getTableRowsCount($table);
		}
		$this->nextProgressUpdate = $this->progressUpdateInterval;
		SGBackupLog::write('Total tables to backup: '.count($tableNames));
		SGBackupLog::write('Total rows to backup: '.$this->totalRowCount);
	}

	private function resetRestoreProgress()
	{
		$this->totalRowCount = $this->getFileLinesCount($this->backupFilePath);
		$this->currentRowCount = 0;
		$this->progressUpdateInterval = SGConfig::get('SG_ACTION_PROGRESS_UPDATE_INTERVAL');
		$this->nextProgressUpdate = $this->progressUpdateInterval;
	}

	private function getTables()
	{
		$tableNames = array();
		$tables = $this->sgdb->query('SHOW TABLES FROM `'.SG_DB_NAME.'`');
		if (!$tables)
		{
			throw new SGExceptionDatabaseError('Could not get tables of database: '.SG_DB_NAME);
		}
		foreach ($tables as $table)
		{
			$tableName = $table['Tables_in_'.SG_DB_NAME];
			$tablesToExclude = explode(',', SGConfig::get('SG_BACKUP_DATABASE_EXCLUDE'));
			if (in_array($tableName, $tablesToExclude))
			{
				continue;
			}
			$tableNames[] = $tableName;
		}
		return $tableNames;
	}

	private function getTableRowsCount($tableName)
	{
		$count = 0;
		$tableRowsNum = $this->sgdb->query('SELECT COUNT(*) AS total FROM '.$tableName);
		$count = @$tableRowsNum[0]['total'];
		return $count;
	}

	private function getFileLinesCount($filePath)
	{
		$fileHandle = @fopen($filePath, 'rb');
		if (!is_resource($fileHandle))
		{
			throw new SGExceptionForbidden('Could not open file: '.$filePath);
		}

		$linecount = 0;
		while (!feof($fileHandle))
		{
			$linecount += substr_count(fread($fileHandle, 8192), "\n");
		}

		@fclose($fileHandle);
		return $linecount;
	}

	private function updateProgress()
	{
		$progress = round($this->currentRowCount*100.0/$this->totalRowCount);

		if ($progress>=$this->nextProgressUpdate)
		{
			$this->nextProgressUpdate += $this->progressUpdateInterval;

			if ($this->delegate)
			{
				$this->delegate->didUpdateProgress($progress);
			}

			return true;
		}

		return false;
	}

	/* Helper Functions */

	private function isWritable($filePath)
	{
		if (!file_exists($filePath))
		{
			$fp = @fopen($filePath, 'wb');
			if (!$fp)
			{
				throw new SGExceptionForbidden('Could not open file: '.$filePath);
			}
			@fclose($fp);
		}
		return is_writable($filePath);
	}
}
