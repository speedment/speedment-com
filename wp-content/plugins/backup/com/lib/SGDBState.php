<?php

require_once(dirname(__FILE__).'/SGState.php');

class SGDBState extends SGState
{
	private $progressCursor = 0;
	private $cursor = 0;
	private $numberOfEntries = 0;
	private $lineSize = 0;
	private $backedUpTables = array();

	function __construct()
	{
		$this->type = SG_STATE_TYPE_DB;
	}

	public function setBackedUpTables($backedUpTables)
	{
		$this->backedUpTables = $backedUpTables;
	}

	public function getBackedUpTables()
	{
		return $this->backedUpTables;
	}

	public function setLineSize($lineSize)
	{
		$this->lineSize = $lineSize;
	}

	public function getLineSize()
	{
		return $this->lineSize;
	}

	public function setNumberOfEntries($numberOfEntries)
	{
		$this->numberOfEntries = $numberOfEntries;
	}

	public function getNumberOfEntries()
	{
		return $this->numberOfEntries;
	}

	public function setCursor($cursor)
	{
		$this->cursor = $cursor;
	}

	public function getCursor()
	{
		return $this->cursor;
	}

	public function setProgressCursor($progressCursor)
	{
		$this->progressCursor = $progressCursor;
	}

	public function getProgressCursor()
	{
		return $this->progressCursor;
	}

	public function init($stateJson)
	{
		$this->lineSize = $stateJson['lineSize'];
		$this->numberOfEntries = $stateJson['numberOfEntries'];
		$this->inprogress = $stateJson['inprogress'];
		$this->cursor = $stateJson['cursor'];
		$this->progressCursor = $stateJson['progressCursor'];
		$this->offset = $stateJson['offset'];
		$this->action = $stateJson['action'];
		$this->actionId = $stateJson['actionId'];
		$this->actionStartTs = $stateJson['actionStartTs'];
		$this->backupFileName = $stateJson['backupFileName'];
		$this->backupFilePath = $stateJson['backupFilePath'];
		$this->progress = $stateJson['progress'];
		$this->warningsFound = $stateJson['warningsFound'];
		$this->pendingStorageUploads = $stateJson['pendingStorageUploads'];
		$this->backedUpTables = $stateJson['backedUpTables'];

		return $this;
	}

	public function save()
	{
		file_put_contents(SG_BACKUP_DIRECTORY.SG_STATE_FILE_NAME, json_encode(array(
			'lineSize' => $this->lineSize,
			'numberOfEntries' => $this->numberOfEntries,
			'inprogress' => $this->inprogress,
			'cursor' => $this->cursor,
			'progressCursor' => $this->progressCursor,
			'offset' => $this->offset,
			'type' => $this->type,
			'token' => $this->token,
			'action' => $this->action,
			'actionId' => $this->actionId,
			'actionStartTs' => $this->actionStartTs,
			'backupFileName' => $this->backupFileName,
			'backupFilePath' => $this->backupFilePath,
			'progress' => $this->progress,
			'warningsFound' => $this->warningsFound,
			'pendingStorageUploads' => $this->pendingStorageUploads,
			'backedUpTables' => $this->backedUpTables
		)));
	}
}
