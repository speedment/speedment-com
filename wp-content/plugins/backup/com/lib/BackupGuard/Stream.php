<?php

namespace BackupGuard;

require_once(dirname(__FILE__).'/RequestHandler.php');

class Stream extends RequestHandler
{
	public function __construct($url)
	{
		parent::__construct($url);

		$this->addHeader('Content-type: application/x-www-form-urlencoded');
	}

	public function post()
	{
		return $this->sendRequest('POST');
	}

	public function get()
	{
		return $this->sendRequest('GET');
	}

	private function sendRequest($type)
	{
		//prepare headers
		$headers = '';
		if (count($this->headers)) {
			$headers = implode("\r\n", $this->headers);
			$headers .= "\r\n";
		}

		//set http request method
		$opts = array(
			'http' => array(
				'method' => $type,
				'user_agent' => 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0',
				'ignore_errors' => '1'
			)
		);

		//set headers
		if ($headers) {
			$opts['http']['header'] = $headers;
		}

		$url = $this->url;

		//set params
		if (count($this->params)) {
			$data = http_build_query($this->params);

			if ($type == 'GET') { //set params inside url
				$url = rtrim($url, '/').'/';

				if ($this->getWithQueryParams) { //standard get url, with query params
					$url .= '?'.http_build_query($this->params);
				}
				else { //mvs-styled get url
					$url .= implode('/', array_values($this->params));
				}
			}
			else if ($type == 'POST') {
				$opts['http']['content'] = $data;
			}
		}

		$context = @stream_context_create($opts);
		$fp = @fopen($url, 'r', false, $context);

		if (isset($http_response_header)) {
			$this->setResponseInfo($http_response_header);
		}

		if ($fp) {
			$this->body = @stream_get_contents($fp);
			@fclose($fp);
		}

		return $this->parseResponse();
	}

	private function parseHTTPHeaders($headers)
	{
		$head = array();
		foreach($headers as $k => $v) {
			$t = explode(':', $v, 2);
			if (isset($t[1])) {
				$head[trim($t[0])] = trim($t[1]);
			}
			else {
				$head[] = $v;
				if (preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $v, $out)) {
					$head['reponse_code'] = intval($out[1]);
				}
			}
		}
		return $head;
	}

	private function setResponseInfo($info)
	{
		$info = $this->parseHTTPHeaders($info);

		if (isset($info['reponse_code'])) {
			$this->httpCode = $info['reponse_code'];
		}

		if (isset($info['Content-Type'])) {
			$this->contentType = $info['Content-Type'];
		}
	}
}
