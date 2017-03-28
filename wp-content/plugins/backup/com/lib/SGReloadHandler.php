<?php

class SGReloadHandler
{
	private $host;
	private $uri;
	private $scheme;
	private $port;
	private $reloadMethod;

	public function __construct($url)
	{
		$this->host = @$_SERVER['HTTP_HOST'];
		$this->url = $url;
		$this->scheme = @$_SERVER['REQUEST_SCHEME'];
		$this->port = @$_SERVER['SERVER_PORT'];

		if (!$this->scheme) {
			$this->scheme = backupGuardGetCurrentUrlScheme();
		}

		if (!$this->port) {
			$this->port = 80;
		}

		$this->reloadMethod = SGConfig::get('SG_RELOAD_METHOD');
		if ($this->reloadMethod === null) {
			$this->setBestReloadMethod();
		}
	}

	public function reload()
	{
		switch ($this->reloadMethod) {
			case SG_RELOAD_METHOD_STREAM:
				$this->reloadUsingStream();
				break;
			case SG_RELOAD_METHOD_CURL:
				$this->reloadUsingCurl();
				break;
			case SG_RELOAD_METHOD_SOCKET:
				$this->reloadUsingSocket();
				break;
		}
	}

	public function canReload()
	{
		return ($this->reloadMethod && $this->reloadMethod!=SG_RELOAD_METHOD_NONE);
	}

	public function setBestReloadMethod()
	{
		$method = SG_RELOAD_METHOD_NONE;

		if (function_exists('curl_version')) {
			$method = SG_RELOAD_METHOD_CURL;
		}
		else if ($this->testStreamConnection()) {
			$method = SG_RELOAD_METHOD_STREAM;
		}
		else if ($this->testSocketConnection()) {
			$method = SG_RELOAD_METHOD_SOCKET;
		}

		SGConfig::set('SG_RELOAD_METHOD', $method, true);

		$this->reloadMethod = $method;
	}

	private function reloadUsingStream()
	{
		//$this->reloadUsingSocket();
		//return;

		$transport = $this->scheme=='http'?'tcp':'ssl';
		$addr = $this->host;

		if ($transport == 'ssl') {
			$context = stream_context_create();
			stream_context_set_option($context, 'ssl', 'verify_host', true);
			stream_context_set_option($context, 'ssl', 'allow_self_signed', true);
			$fp = @stream_socket_client("$transport://$addr:".$this->port, $errno, $errstr, 15, STREAM_CLIENT_CONNECT, $context);
		}
		else {
			$fp = @stream_socket_client("$transport://$addr:".$this->port, $errno, $errstr, 15, STREAM_CLIENT_CONNECT);
		}

		if ($fp === false) {
			return false;
		}

		$out = "GET ".$this->url." HTTP/1.1\r\n";
		$out .= "Host: ".$this->host."\r\n";
		$out .= "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/602.4.8 (KHTML, like Gecko) Version/10.0.3 Safari/602.4.8\r\n";
		$out .= "Connection: Close\r\n\r\n";

		@fwrite($fp, $out);
		sleep(1);
		@fclose($fp);
	}

	private function reloadUsingCurl()
	{
		$this->reloadUsingStream();
		return;

		$url = $this->scheme.'://'.$this->host.$this->url;
		if (strpos($url, '?action=backup_guard_manualBackup')===FALSE) {
			$url .= '?action=backup_guard_manualBackup';
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_HEADER, TRUE);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'doNothing');
		//curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10);
		//curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
		//curl_setopt($ch, CURLOPT_POST, TRUE);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=backup_guard_manualBackup');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_exec($ch);
		curl_close($ch);
	}

	private function reloadUsingSocket()
	{
		$this->reloadUsingStream();
		return;

		$addr = @gethostbyname($this->host);
		$transport = $this->scheme=='http'?'tcp':'ssl';

		$fp = @fsockopen("$transport://$addr", $this->port, $errno, $errstr, 15);

		if ($fp === false) {
			return false;
		}

		$out = "GET ".$this->url." HTTP/1.1\r\n";
		$out .= "Host: ".$this->host."\r\n";
		$out .= "Connection: Close\r\n\r\n";

		@fwrite($fp, $out);
		sleep(1);
		@fclose($fp);
	}

	private function testStreamConnection()
	{
		$addr = @gethostbyname($this->host);
		$fp = @stream_socket_client("tcp://$addr:".$this->port, $errno, $errstr);

		if ($fp === false) {
			return false;
		}

		@fclose($fp);
		return true;
	}

	private function testSocketConnection()
	{
		$fp = @fsockopen($this->host, $this->port, $errno, $errstr, 10);

		if ($fp === false) {
			return false;
		}

		@fclose($fp);
		return true;
	}
}

function doNothing($curl, $input)
{
	return 0;
}
