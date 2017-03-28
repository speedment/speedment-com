<?php

namespace BackupGuard;

require_once(dirname(__FILE__).'/RequestHandler.php');

class Curl extends RequestHandler
{
	private $handle = null;

	public function __construct($url)
	{
		parent::__construct($url);

		$this->handle = curl_init();

		$this->set(CURLOPT_SSL_VERIFYPEER, false);
		$this->set(CURLOPT_SSL_VERIFYHOST, 0);
		$this->set(CURLOPT_SSLVERSION, 1);
		$this->set(CURLOPT_RETURNTRANSFER, true);
		$this->set(CURLOPT_CONNECTTIMEOUT, 10);
		$this->set(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');

		$this->addHeader('Content-type: application/x-www-form-urlencoded');
	}

	public function post()
	{
		$this->set(CURLOPT_POST, true);

		if (count($this->params)) {
			$this->set(CURLOPT_POSTFIELDS, http_build_query($this->params));
		}

		return $this->sendRequest('POST');
	}

	public function get()
	{
		$this->set(CURLOPT_HTTPGET, true);
		return $this->sendRequest('GET');
	}

	private function sendRequest($type)
	{
		$url = $this->url;

		//prepare url for get request
		if ($type == 'GET' && count($this->params)) {
			$url = rtrim($url, '/').'/';

			if ($this->getWithQueryParams) { //standard get url, with query params
				$url .= '?'.http_build_query($this->params);
			}
			else { //mvs-styled get url
				$url .= implode('/', array_values($this->params));
			}
		}

		$this->set(CURLOPT_URL, $url);
		$this->set(CURLOPT_HTTPHEADER, $this->headers);

		$body = curl_exec($this->handle);

		if ($body !== false) {
			$this->body = $body;
			$info = curl_getinfo($this->handle);
			$this->setResponseInfo($info);
			return $this->parseResponse();
		}

		return false;
	}

	public function set($option, $value)
	{
		curl_setopt($this->handle, $option, $value);
	}

	public function __destruct()
	{
		if ($this->handle) {
			curl_close($this->handle);
		}
	}

	private function setResponseInfo($info)
	{
		if (isset($info['http_code'])) {
			$this->httpCode = $info['http_code'];
		}

		if (isset($info['content_type'])) {
			$this->contentType = $info['content_type'];
		}
	}
}
