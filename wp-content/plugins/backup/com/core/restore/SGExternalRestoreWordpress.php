<?php

class SGExternalRestoreWordpress extends SGExternalRestore
{
	private $destinationPath = '';
	private $destinationUrl = '';

	protected function canPrepare()
	{
		//please lets try to check if it can work in the root directory
		$this->destinationUrl = rtrim(SG_SITE_URL, '/').'/';
		$this->destinationPath = ABSPATH;
		if ($this->testUrlAvailability($this->destinationUrl, $this->destinationPath)) {
			return true;
		}

		//then we check for the uploads directory
		$this->destinationUrl = SG_UPLOAD_URL.'/';
		$this->destinationPath = SG_UPLOAD_PATH.'/';
		if ($this->testUrlAvailability($this->destinationUrl, $this->destinationPath)) {
			return true;
		}

		return false;
	}

	protected function getCustomConstants()
	{
		return array(
			'ABSPATH' => ABSPATH,
			'DB_NAME' => DB_NAME,
			'DB_USER' => DB_USER,
			'DB_PASSWORD' => DB_PASSWORD,
			'DB_HOST' => DB_HOST,
			'DB_CHARSET' => DB_CHARSET
		);
	}

	public function getDestinationPath()
	{
		return $this->destinationPath;
	}

	public function getDestinationUrl()
	{
		return $this->destinationUrl;
	}

	private function testUrlAvailability($url, $path)
	{
		$path .= 'bg_test.php';
		$url .= 'bg_test.php';
		if (@file_put_contents($path, '<?php echo "ok"; ?>')) {
			$headers = @get_headers($url);
			if (!empty($headers) && strpos($headers[0], '200')!==false) {
				@unlink($path);
				return true;
			}
			@unlink($path);
		}

		return false;
	}
}
