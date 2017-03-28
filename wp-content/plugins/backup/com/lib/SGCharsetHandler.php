<?php

class SGCharsetHandler
{
	private $utf8mb4Available = false;
	private $utf8mb4520Available = false;

	public function __construct()
	{
		$this->utf8mb4Available = $this->mysqlHasCapability('utf8mb4');
		$this->utf8mb4520Available = $this->mysqlHasCapability('utf8mb4_520');
	}

	public function replaceInvalidCharsets($query)
	{
		$search = array();
		$replace = array();

		//check for utf8mb4_520 support first
		if (!$this->utf8mb4520Available) {
			$search[] = 'COLLATE=utf8mb4_unicode_520_ci';
			$replace[] = $this->utf8mb4Available?'COLLATE=utf8mb4_unicode_ci':'COLLATE=utf8_general_ci';

			$search[] = 'COLLATE utf8mb4_unicode_520_ci';
			$replace[] = $this->utf8mb4Available?'COLLATE utf8mb4_unicode_ci':'COLLATE utf8_general_ci';
		}

		//then check for utf8mb4 support
		if (!$this->utf8mb4Available) {
			$search[] = 'COLLATE=utf8mb4_unicode_ci';
			$replace[] = 'COLLATE=utf8_general_ci';

			$search[] = 'COLLATE utf8mb4_unicode_ci';
			$replace[] = 'COLLATE utf8_general_ci';

			$search[] = 'CHARACTER SET utf8mb4';
			$replace[] = 'CHARACTER SET utf8';

			$search[] = 'CHARSET=utf8mb4';
			$replace[] = 'CHARSET=utf8';

			$search[] = 'character_set_client = utf8mb4';
			$replace[] = 'character_set_client = utf8';

			$search[] = 'SET NAMES utf8mb4';
			$replace[] = 'SET NAMES utf8';
		}

		if (count($search) && count($replace)) {
			$query = str_replace($search, $replace, $query);
		}

		return $query;
	}

	public function getMysqlClientInfo()
	{
		if (function_exists('mysqli_connect')) {
			if (version_compare(phpversion(), '5.5', '>=') || !function_exists('mysql_connect')) {
				return @mysqli_get_client_info();
			}
		}

		return @mysql_get_client_info();
	}

	public function mysqlHasCapability($cap)
	{
		if ($cap == 'utf8mb4') {
			if (version_compare(SG_MYSQL_VERSION, '5.5.3', '<')) {
				return false;
			}

			$clientVersion = $this->getMysqlClientInfo();
			/*
			 * libmysql has supported utf8mb4 since 5.5.3, same as the MySQL server.
			 * mysqlnd has supported utf8mb4 since 5.0.9.
			 */
			if (false !== strpos($clientVersion, 'mysqlnd')) {
				$clientVersion = preg_replace('/^\D+([\d.]+).*/', '$1', $clientVersion);
				return version_compare($clientVersion, '5.0.9', '>=');
			}
			else {
				return version_compare($clientVersion, '5.5.3', '>=');
			}
		}
		else if ($cap == 'utf8mb4_520') {
			return version_compare(SG_MYSQL_VERSION, '5.6', '>=');
		}

		return false;
	}
}
