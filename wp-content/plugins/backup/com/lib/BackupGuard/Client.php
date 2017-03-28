<?php

namespace BackupGuard;

require_once(dirname(__FILE__).'/Helper.php');

class Client
{
	private $accessToken = null;

	public function __construct($accessToken = null)
	{
		$this->setAccessToken($accessToken);
	}

	public function getAccessToken()
	{
		return $this->accessToken;
	}

	public function setAccessToken($accessToken)
	{
		$this->accessToken = $accessToken;
	}

	public function createAccessToken($clientId, $clientSecret, $email, $password)
	{
		$response = Helper::sendPostRequest(
			'/token',
			array(
				'grant_type' => 'password',
				'client_id' => $clientId,
				'client_secret' => $clientSecret,
				'email' => $email,
				'password' => $password
			)
		);

		Helper::validateResponse($response);

		$accessToken = $response->getBodyParam('access_token');
		$refreshToken = $response->getBodyParam('refresh_token');

		return array(
			'access_token' => $accessToken,
			'refresh_token' => $refreshToken
		);
	}

	public function refreshAccessToken($clientId, $clientSecret, $refreshToken)
	{
		$response = Helper::sendPostRequest(
			'/token',
			array(
				'grant_type' => 'refresh_token',
				'client_id' => $clientId,
				'client_secret' => $clientSecret,
				'refresh_token' => $refreshToken
			)
		);

		Helper::validateResponse($response);

		$accessToken = $response->getBodyParam('access_token');
		$refreshToken = $response->getBodyParam('refresh_token');

		return array(
			'access_token' => $accessToken,
			'refresh_token' => $refreshToken
		);
	}

	public function getCurrentUser()
	{
		Helper::requiredParam('access_token', $this->getAccessToken());

		$response = Helper::sendGetRequest(
			'/users',
			array(),
			array(
				'access_token: '.$this->getAccessToken()
			)
		);

		Helper::validateResponse($response);

		return $response->getBody();
	}

	public function createUser($userInfo)
	{
		Helper::requiredParam('access_token', $this->getAccessToken());
		Helper::requiredParamInArray($userInfo, 'email');
		Helper::requiredParamInArray($userInfo, 'password');
		Helper::requiredParamInArray($userInfo, 'firstname');
		Helper::requiredParamInArray($userInfo, 'lastname');

		$params = array(
			'email' => $userInfo['email'],
			'password' => $userInfo['password'],
			'firstname' => $userInfo['firstname'],
			'lastname' => $userInfo['lastname']
		);

		if (!empty($userInfo['package'])) {
			$params['package'] = $userInfo['package'];
		}

		$response = Helper::sendPostRequest(
			'/users',
			$params,
			array(
				'access_token: '.$this->getAccessToken()
			)
		);

		Helper::validateResponse($response);

		return $response->getBodyParam('user_id');
	}

	public function getBanner($env, $userType = null)
	{
		Helper::requiredParam('environment', $env);

		$params = array(
			'environment' => $env
		);

		if ($userType) {
			$params['user_type'] = $userType;
		}

		$response = Helper::sendGetRequest(
			'/banners',
			$params
		);

		Helper::validateResponse($response);

		return $response->getBody();
	}

	public function validateUrl($url, $productName)
	{
		Helper::requiredParam('access_token', $this->getAccessToken());
		Helper::requiredParam('url', $url);
		Helper::requiredParam('product', $productName);

		$params = array(
			'url' => $url,
			'product' => $productName
		);

		$response = Helper::sendPostRequest(
			'/products/validateUrl',
			$params,
			array(
				'access_token: '.$this->getAccessToken()
			)
		);

		Helper::validateResponse($response);

		return $response->getBodyParam('license');
	}

	public function getAllUserProducts($productName = '')
	{
		Helper::requiredParam('access_token', $this->getAccessToken());

		$params = array();

		if ($productName) {
			$params['product'] = $productName;
		}

		$response = Helper::sendGetRequest(
			'/products',
			$params,
			array(
				'access_token: '.$this->getAccessToken()
			)
		);

		Helper::validateResponse($response);

		return $response->getBodyParam('products');
	}

	public function linkUrlToProduct($url, $userProductId)
	{
		Helper::requiredParam('access_token', $this->getAccessToken());
		Helper::requiredParam('url', $url);
		Helper::requiredParam('product_id', $userProductId);

		$params = array(
			'url' => $url,
			'id' => $userProductId
		);

		$response = Helper::sendPostRequest(
			'/products/link',
			$params,
			array(
				'access_token: '.$this->getAccessToken()
			)
		);

		Helper::validateResponse($response);

		return $response->getBodyParam('link_id');
	}
}
