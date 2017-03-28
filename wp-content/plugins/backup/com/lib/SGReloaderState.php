<?php

class SGReloaderState
{
	private $state;
	private $callback;

	public function __construct($callback = '', $state = SG_RELOADER_STATUS_IDLE)
	{
		$this->state = $state;
		$this->callback = $callback;
	}

	public function setCallback($callback)
	{
		$this->callback = $callback;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function update()
	{
		//save state file
		$sgReloaderState = array(
			'state' => $this->state,
			'callback' => $this->callback
		);

		file_put_contents(SG_BACKUP_DIRECTORY.SG_RELOADER_STATE_FILE_NAME, json_encode($sgReloaderState));
	}

	public static function reset()
	{
		$sgReloaderState = array(
			'state' => SG_RELOADER_STATUS_IDLE,
			'callback' => ''
		);

		file_put_contents(SG_BACKUP_DIRECTORY.SG_RELOADER_STATE_FILE_NAME, json_encode($sgReloaderState));
	}

	public static function loadState()
	{
		$sgReloaderState = array(
			'state' => SG_RELOADER_STATUS_IDLE,
			'callback' => ''
		);

		if (file_exists(SG_BACKUP_DIRECTORY.SG_RELOADER_STATE_FILE_NAME)) {
			$sgReloaderState = file_get_contents(SG_BACKUP_DIRECTORY.SG_RELOADER_STATE_FILE_NAME);
			$sgReloaderState = json_decode($sgReloaderState, true);
		}

		return $sgReloaderState;
	}
}
