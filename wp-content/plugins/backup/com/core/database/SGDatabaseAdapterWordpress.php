<?php
require_once(SG_DATABASE_PATH.'SGIDatabaseAdapter.php');

class SGDatabaseAdapterWordpress implements SGIDatabaseAdapter
{
	private $fetchRowIndex = 0;
	private $lastResult = array();
	private $connection = null;
	private $mysqliAvailable = false;

	public function __construct()
	{
		$this->mysqliAvailable = $this->isMysqliAvailable();
	}

	public function query($query, $params=array(), $resultType = ARRAY_A)
	{
		global $wpdb;

		$op = strtoupper(substr(trim($query), 0, 6));
		if ($op!='INSERT' && $op!='UPDATE' && $op!='DELETE')
		{
			if(!empty($params))
			{
				return @$wpdb->get_results($wpdb->prepare($query, $params), $resultType);
			}
			return @$wpdb->get_results($query, $resultType);
		}
		else
		{
			if(!empty($params))
			{
				return $wpdb->query($wpdb->prepare($query, $params));
			}
			return $wpdb->query($query);
		}
	}

	public function exec($query)
	{
		//as wpdb doesn't work with statements, this function will just return true or false

		global $wpdb;

		$this->fetchRowIndex = 0;
		$res = $wpdb->query($query);

		if ($res === false) {
			return false;
		}
		return true;
	}

	public function execRaw($query)
	{
		//if mysqli is not available, run the query using wpdb
		if (!$this->mysqliAvailable) {
			return $this->exec($query);
		}

		//mysqli is available
		if (!$this->connection) { //but there isn't any active connection
			if (!$this->connectOverMysqli()) { //try to connect
				$this->mysqliAvailable = false;
				return $this->exec($query); //could not connect; continue using wpdb.
			}
		}

		//mysqli is already connected, use it
		return mysqli_real_query($this->connection, $query);
	}

	private function connectOverMysqli()
	{
		$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		//set charset just in case if set names (inside sql file) doesn't work
		if ($this->connection) {
			mysqli_set_charset($this->connection, SG_DB_CHARSET);
		}

		return $this->connection;
	}

	private function isMysqliAvailable()
	{
		return function_exists('mysqli_connect');
	}

	public function fetch($st)
	{
		global $wpdb;

		if ($this->fetchRowIndex==0) {
			$this->lastResult = $wpdb->last_result;
		}

		$res = @$this->lastResult[$this->fetchRowIndex];
		if (!$res) return false;

		$this->fetchRowIndex++;
		return get_object_vars($res);
	}

	public function lastInsertId()
	{
		global $wpdb;
		return $wpdb->insert_id;
	}

	public function getLastError()
	{
		if ($this->mysqliAvailable && $this->connection) {
			return mysqli_error($this->connection);
		}

		global $wpdb;
		return $wpdb->last_error;
	}

	public function flush()
	{
		global $wpdb;
		$wpdb->flush();
	}
}
