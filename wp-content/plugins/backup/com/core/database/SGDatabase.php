<?php

class SGDatabase
{
	private static $instance = null;

	public static function getInstance()
	{
		if (!self::$instance)
		{
			self::$instance = self::createAdapterInstance();
		}

		return self::$instance;
	}

	private static function createAdapterInstance()
	{
		$className = 'SGDatabaseAdapter'.SG_DB_ADAPTER;
		require_once(SG_DATABASE_PATH.$className.'.php');
		$adapter = new $className();
		return $adapter;
	}

	private function __construct()
	{

	}

	private function __clone()
	{

	}
}