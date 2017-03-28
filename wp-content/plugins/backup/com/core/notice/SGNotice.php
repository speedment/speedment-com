<?php

class SGNotice
{
	private static $instance = null;

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = self::createAdapterInstance();
		}

		return self::$instance;
	}

	private static function createAdapterInstance()
	{
		$className = 'SGNoticeAdapter'.SG_ENV_ADAPTER;
		require_once(dirname(__FILE__).'/'.$className.'.php');
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
