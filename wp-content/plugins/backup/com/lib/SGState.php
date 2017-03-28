<?php

require_once(SG_LIB_PATH.'SGFileState.php');
require_once(SG_LIB_PATH.'SGDBState.php');
require_once(SG_LIB_PATH.'SGUploadState.php');

class SGState
{
	public $inprogress = false;
	public $type = '';
	public $token = '';
	public $action = '';
	public $actionId = null;
	public $actionStartTs = 0;
	public $backupFileName = '';
	public $backupFilePath = '';
	public $progress = 0;
	public $warningsFound = false;
	public $pendingStorageUploads = array();

	public $offset = 0;

	function __construct()
	{
	}

	public function setInprogress($inprogress)
	{
		$this->inprogress = $inprogress;
	}

	public function setToken($token)
	{
		$this->token = $token;
	}

	public function setAction($action)
	{
		$this->action = $action;
	}

	public function setType($type)
	{
		$this->type = $type;
	}

	public function setActionId($actionId)
	{
		$this->actionId = $actionId;
	}

	public function setActionStartTs($actionStartTs)
	{
		$this->actionStartTs = $actionStartTs;
	}

	public function setBackupFileName($name)
	{
		$this->backupFileName = $name;
	}

	public function setBackupFilePath($backupFilePath)
	{
		$this->backupFilePath = $backupFilePath;
	}

	public function setProgress($progress)
	{
		$this->progress = $progress;
	}

	public function setWarningsFound($warningsFound)
	{
		$this->warningsFound = $warningsFound;
	}

	public function setPendingStorageUploads($pendingStorageUploads)
	{
		$this->pendingStorageUploads = $pendingStorageUploads;
	}

	public function getInprogress()
	{
		return $this->inprogress;
	}

	public function getToken()
	{
		return $this->token;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getActionId()
	{
		return $this->actionId;
	}

	public function getActionStartTs()
	{
		return $this->actionStartTs;
	}

	public function getBackupFileName()
	{
		return $this->backupFileName;
	}

	public function getBackupFilePath()
	{
		return $this->backupFilePath;
	}

	public function getProgress()
	{
		return $this->progress;
	}

	public function getWarningsFound()
	{
		return $this->warningsFound;
	}

	public function getPendingStorageUploads()
	{
		return $this->pendingStorageUploads;
	}

	public function setOffset($offset)
	{
		$this->offset = $offset;
	}

	public function getOffset()
	{
		return $this->offset;
	}

	public function factory($stateJson)
	{
		$stateJson = json_decode($stateJson, true);

		$type = $stateJson['type'];

		if ($type == SG_STATE_TYPE_FILE) {
			$sgState = new SGFileState();
		}
		else if ($type == SG_STATE_TYPE_UPLOAD) {
			$sgState = new SGUploadState();
		}
		else {
			$sgState = new SGDBState();
		}

		$sgState = $sgState->init($stateJson);
		return $sgState;
	}
}
