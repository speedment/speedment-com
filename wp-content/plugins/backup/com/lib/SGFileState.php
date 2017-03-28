<?php

require_once(dirname(__FILE__).'/SGState.php');

class SGFileState extends SGState
{
	private $cdrSize = 0;
	private $ranges = array();
	private $fileOffsetInArchive = 0;
	private $headerSize = 0;
	private $cdr = array();
	private $cursor = 0;
	private $rangeCursor = 0;
	private $numberOfEntries = 0;

	private $progressCursor = 0;
	private $cdrCursor = 0;

	function __construct()
	{
		$this->type = SG_STATE_TYPE_FILE;
	}

	public function setCdrCursor($cdrCursor)
	{
		$this->cdrCursor = $cdrCursor;
	}

	public function getCdrCursor()
	{
		return $this->cdrCursor;
	}

	public function getProgressCursor()
	{
		return $this->progressCursor;
	}

	public function setProgressCursor($progressCursor)
	{
		$this->progressCursor = $progressCursor;
	}

	public function setCursor($cursor)
	{
		$this->cursor = $cursor;
	}

	public function setRangeCursor($rangeCursor)
	{
		$this->rangeCursor = $rangeCursor;
	}

	public function setNumberOfEntries($numberOfEntries)
	{
		$this->numberOfEntries = $numberOfEntries;
	}

	public function getCursor()
	{
		return $this->cursor;
	}

	public function getRangeCursor()
	{
		return $this->rangeCursor;
	}

	public function getNumberOfEntries()
	{
		return $this->numberOfEntries;
	}

	public function setCdr($cdr = array())
	{
		$this->cdr = $cdr;
	}

	public function getCdr()
	{
		return $this->cdr;
	}

	public function setCdrSize($cdrSize)
	{
		$this->cdrSize = $cdrSize;
	}

	public function setRanges($ranges)
	{
		$this->ranges = $ranges;
	}

	public function setHeaderSize($headerSize)
	{
		$this->headerSize = $headerSize;
	}

	public function getHeaderSize()
	{
		return $this->headerSize;
	}

	public function getRanges()
	{
		return $this->ranges;
	}

	public function getCdrSize()
	{
		return $this->cdrSize;
	}

	public function getFileOffsetInArchive()
	{
		return $this->fileOffsetInArchive;
	}

	public function setFileOffsetInArchive($fileOffsetInArchive)
	{
		$this->fileOffsetInArchive = $fileOffsetInArchive;
	}

	public function init($stateJson)
	{
		$this->cdrSize = $stateJson['cdrSize'];
		$this->ranges = $stateJson['ranges'];
		$this->offset = $stateJson['offset'];
		$this->headerSize = $stateJson['headerSize'];
		$this->inprogress = $stateJson['inprogress'];
		$this->cdr = $stateJson['cdr'];
		$this->action = $stateJson['action'];
		$this->actionId = $stateJson['actionId'];
		$this->actionStartTs = $stateJson['actionStartTs'];
		$this->backupFileName = $stateJson['backupFileName'];
		$this->backupFilePath = $stateJson['backupFilePath'];
		$this->progress = $stateJson['progress'];
		$this->warningsFound = $stateJson['warningsFound'];
		$this->pendingStorageUploads = $stateJson['pendingStorageUploads'];
		$this->numberOfEntries = $stateJson['numberOfEntries'];
		$this->cursor = $stateJson['cursor'];
		$this->rangeCursor = $stateJson['rangeCursor'];
		$this->fileOffsetInArchive = $stateJson['fileOffsetInArchive'];
		$this->progressCursor = $stateJson['progressCursor'];
		$this->cdrCursor = $stateJson['cdrCursor'];

		return $this;
	}

	public function save()
	{
		file_put_contents(SG_BACKUP_DIRECTORY.SG_STATE_FILE_NAME, json_encode(array(
			'inprogress' => $this->inprogress,
			'headerSize' => $this->headerSize,
			'offset' => $this->offset,
			'ranges' => $this->ranges,
			'type' => $this->type,
			'token' => $this->token,
			'action' => $this->action,
			'actionId' => $this->actionId,
			'actionStartTs' => $this->actionStartTs,
			'backupFileName' => $this->backupFileName,
			'backupFilePath' => $this->backupFilePath,
			'progress' => $this->progress,
			'warningsFound' => $this->warningsFound,
			'cdrSize' => $this->cdrSize,
			'pendingStorageUploads' => $this->pendingStorageUploads,
			'cdr' => $this->cdr,
			'numberOfEntries' => $this->numberOfEntries,
			'cursor' => $this->cursor,
			'rangeCursor' => $this->rangeCursor,
			'fileOffsetInArchive' => $this->fileOffsetInArchive,
			'progressCursor' => $this->progressCursor,
			'cdrCursor' => $this->cdrCursor
		)));
	}
}
