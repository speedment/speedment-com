<?php

require_once(SG_BACKUP_PATH.'SGBackup.php');
require_once(SG_LIB_PATH.'SGReloaderState.php');
require_once(SG_LIB_PATH.'SGReloadHandler.php');
require_once(SG_LIB_PATH.'SGCallback.php');

class SGReloader
{
	public static function awake()
	{
		$reloaderState = SGReloaderState::loadState();
		if ($reloaderState['callback'] != "" && $reloaderState['state'] == SG_RELOADER_STATUS_IDLE) {
			$callbackJson = json_decode($reloaderState['callback']);
			$callback = new SGCallback($callbackJson->class, $callbackJson->method, $callbackJson->params);

			if ($callback->canPerform()) {
				self::saveState('', SG_RELOADER_STATUS_RUNNING);
				$callback->perform();
			}
		}

		return;
	}

	private static function saveState($callback, $state = SG_RELOADER_STATUS_IDLE)
	{
		$sgReloaderState = new SGReloaderState();
		$sgReloaderState->setCallback($callback);
		$sgReloaderState->setState($state);
		$sgReloaderState->update();
	}

	public static function didCompleteCallback()
	{
		self::saveState('', SG_RELOADER_STATUS_IDLE);
	}

	public static function registerCallback(SGCallback $callback)
	{
		self::saveState($callback->toString());
	}

	public static function reset()
	{
		SGReloaderState::reset();
	}

	public static function reloadWithAjaxUrl($awakeURL)
	{
		//external restore works only with ajax requests
		if (defined('BG_EXTERNAL_RESTORE_RUNNING') && BG_EXTERNAL_RESTORE_RUNNING) {
			return;
		}

		// awake frequency in miliseconds
		$sgAwakeFrequency = SGConfig::get('SG_AJAX_REQUEST_FREQUENCY')?SGConfig::get('SG_AJAX_REQUEST_FREQUENCY'):SG_AJAX_DEFAULT_REQUEST_FREQUENCY;
		$sgAwakeFrequency = $sgAwakeFrequency/1000; // awake frequency in seconds

		// add 3 seconds to awake frequency
		$timeout = $sgAwakeFrequency + 3;
		while ($timeout) {

			$reloaderState = SGReloaderState::loadState();
			$state = $reloaderState['state'];

			if ($state == SG_RELOADER_STATUS_RUNNING) {
				return;
			}

			sleep(1);
			$timeout--;
		}

		self::reload($awakeURL);
	}

	private static function reload($awakeURL)
	{
		$sgReloadHandler = new SGReloadHandler($awakeURL);
		$sgReloadHandler->reload();
		return;
	}
}
