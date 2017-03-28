<?php

namespace BackupGuard;

require_once(dirname(__FILE__).'/Curl.php');
require_once(dirname(__FILE__).'/Stream.php');

abstract class RequestHandler
{
	protected $url = '';
	protected $params = array();
	protected $headers = array();
	protected $httpCode = false;
	protected $contentType = false;
	protected $body = false;
	protected $getWithQueryParams = false;

	public function __construct($url)
	{
		$this->url = $url;
	}

	abstract public function post();

	abstract public function get();

	public static function createRequest($url)
	{
		//if curl is available, use it
		if (function_exists('curl_version')) {
			return new Curl($url);
		}

		return new Stream($url);
	}

	public function addHeader($header)
	{
		$this->headers[] = $header;
	}

	public function setHeaders($headers)
	{
		$this->headers = $headers;
	}

	public function addParam($key, $value)
	{
		$this->params[$key] = $value;
	}

	public function setParams($params)
	{
		$this->params = $params;
	}

	protected function parseResponse()
	{
		$response = new Response();
		$response->setBody($this->body);
		$response->setHttpStatus($this->httpCode);
		$response->setContentType($this->contentType);

		//if the response is in json format, decode it
		if ($this->contentType == 'application/json') {
			$response->parseJsonBody();
		}

		return $response;
	}
}
