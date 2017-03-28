<?php

class SGPing
{
	public static $lastUpdateTs;

	public static function shouldUpdate()
	{
		if ((int)time()-self::$lastUpdateTs < SG_PING_DATE_UPDATE_FREQUENCY) {
			return false;
		}

		return true;
	}

	public static function ping()
	{
		$time = @file_get_contents(SG_PING_FILE_PATH);
		$time = json_decode($time, true);

		if (time()-$time['ts'] >= SG_BACKUP_TIMEOUT) {
			return false;
		}

		return true;
	}

	public static function update()
	{
		if (self::shouldUpdate()) {
			@file_put_contents(SG_PING_FILE_PATH, json_encode(array(
				'ts' => time()
			)));
			self::$lastUpdateTs = time();
		}
	}
}
