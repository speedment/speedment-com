<?php

namespace BackupGuard;

class Response
{
	private $httpStatus = false;
	private $contentType = false;
	private $body = false;

	public function getHttpStatus()
	{
		return $this->httpStatus;
	}

	public function setHttpStatus($httpStatus)
	{
		$this->httpStatus = $httpStatus;
	}

	public function getContentType()
	{
		return $this->contentType;
	}

	public function setContentType($contentType)
	{
		$this->contentType = $contentType;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function setBody($body)
	{
		$this->body = $body;
	}

	public function parseJsonBody()
	{
		if ($this->body) {
			$this->body = json_decode($this->body, true);
		}
	}

	public function getBodyParam($key)
	{
		if (is_array($this->body) && isset($this->body[$key])) {
			return $this->body[$key];
		}

		return null;
	}
}
