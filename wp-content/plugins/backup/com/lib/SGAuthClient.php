<?php

require_once(dirname(__FILE__).'/BackupGuard/Client.php');

class SGAuthClient
{
	private static $instance = null;
	private $client = null;
	private $accessToken = '';
	private $accessTokenExpires = 0;

	private function __construct()
	{
		$this->accessToken = SGConfig::get('SG_BACKUPGUARD_ACCESS_TOKEN', true);
		$this->accessTokenExpires = SGConfig::get('SG_BACKUPGUARD_ACCESS_TOKEN_EXPIRES', true);

		$this->client = new BackupGuard\Client($this->accessToken);
	}

	private function __clone()
	{

	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function getAccessToken()
	{
		return $this->accessToken;
	}

	public function login($email, $password)
	{
		try {
			$accessToken = $this->createAccessToken($email, $password);
		}
		catch (BackupGuard\Exception $ex) {
			return false;
		}

		$this->client->setAccessToken($accessToken);

		return true;
	}

	public function logout()
	{
		$this->setTokens(); //reset all tokens
		$this->client->setAccessToken(null);
		return true;
	}

	public function getCurrentUser()
	{
		try {
			$user = $this->client->getCurrentUser();
		}
		catch (BackupGuard\Exception $ex) {
			return false;
		}

		return $user;
	}

	public function validateUrl($url)
	{
		if (!$this->prepareAuthorizedRequest()) {
			return -1;
		}

		try {
			$result = $this->client->validateUrl($url, SG_PRODUCT_IDENTIFIER);
		}
		catch (BackupGuard\Exception $ex) {
			$result = $this->handleUnauthorizedException($ex);
			if ($result === true) { //we can try again
				$result = $this->validateUrl($url);
			}
		}

		return $result;
	}

	public function getAllUserProducts()
	{
		if (!$this->prepareAuthorizedRequest()) {
			return -1;
		}

		try {
			$result = $this->client->getAllUserProducts(SG_PRODUCT_IDENTIFIER);
		}
		catch (BackupGuard\Exception $ex) {
			$result = $this->handleUnauthorizedException($ex);
			if ($result === true) { //we can try again
				$result = $this->getAllUserProducts();
			}
		}

		return $result;
	}

	public function isAnyLicenseAvailable($products)
	{
		foreach ($products as $product) {
			if (!$product['licenses']) {
				return true;
			}
			$availableLicenses = $product['licenses']-$product['used_licenses'];
			if ($availableLicenses > 0) {
				return true;
			}
		}

		return false;
	}

	public function linkUrlToProduct($url, $userProductId, &$error)
	{
		if (!$this->prepareAuthorizedRequest()) {
			return -1;
		}

		try {
			$result = $this->client->linkUrlToProduct($url, $userProductId);
		}
		catch (BackupGuard\Exception $ex) {
			$result = $this->handleUnauthorizedException($ex);
			if ($result === true) { //we can try again
				$result = $this->linkUrlToProduct($url, $userProductId);
			}

			$error = $ex->getMessage();
		}

		return $result;
	}

	public function filterUpdateChecks($options)
	{
		//we need to be sure that access token is fresh before checking for updates
		$this->prepareAuthorizedRequest();

		$options['headers']['access_token'] = $this->getAccessToken();

		return $options;
	}

	private function handleUnauthorizedException($ex)
	{
		if ($ex instanceof BackupGuard\UnauthorizedException) {
			//access token has expired or is invalid, refresh it
			if ($this->refreshAccessToken()) {
				return true;
			}
			else {
				return -1; //could not refresh token, login is required
			}
		}

		return false;
	}

	private function prepareAuthorizedRequest()
	{
		//no access token found, login is required
		if (!$this->accessToken) {
			return false;
		}

		//access token is expired, try to refresh it
		if (time() > $this->accessTokenExpires) {
			if (!$this->refreshAccessToken()) {
				return false;
			}
		}

		return true;
	}

	private function setTokens($accessToken = '', $accessTokenExpires = 0, $refreshToken = '')
	{
		$this->accessToken = $accessToken;
		$this->accessTokenExpires = $accessTokenExpires;
		$this->client->setAccessToken($accessToken);

		SGConfig::set('SG_BACKUPGUARD_ACCESS_TOKEN', $accessToken, true);
		SGConfig::set('SG_BACKUPGUARD_ACCESS_TOKEN_EXPIRES', $accessTokenExpires, true);

		SGConfig::set('SG_BACKUPGUARD_REFRESH_TOKEN', $refreshToken, true);
	}

	private function createAccessToken($email, $password)
	{
		$tokens = $this->client->createAccessToken(
			SG_BACKUPGUARD_CLIENT_ID,
			SG_BACKUPGUARD_CLIENT_SECRET,
			$email,
			$password
		);

		$this->setTokens(
			$tokens['access_token'],
			time()+BackupGuard\Config::TOKEN_EXPIRES,
			$tokens['refresh_token']
		);

		return $tokens['access_token'];
	}

	private function refreshAccessToken()
	{
		$refreshToken = SGConfig::get('SG_BACKUPGUARD_REFRESH_TOKEN', true);
		if (!$refreshToken) {
			$this->logout();
			return false;
		}

		try {
			$tokens = $this->client->refreshAccessToken(
				SG_BACKUPGUARD_CLIENT_ID,
				SG_BACKUPGUARD_CLIENT_SECRET,
				$refreshToken
			);
		}
		catch (BackupGuard\Exception $ex) { //for some reason the refresh token doesn't work
			$this->logout();
			return false;
		}

		$this->setTokens(
			$tokens['access_token'],
			time()+BackupGuard\Config::TOKEN_EXPIRES,
			$tokens['refresh_token']
		);

		return $tokens['access_token'];
	}
}
