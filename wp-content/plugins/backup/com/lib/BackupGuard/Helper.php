<?php

namespace BackupGuard;

require_once(dirname(__FILE__).'/Exception/BadRequest.php');
require_once(dirname(__FILE__).'/Exception/Forbidden.php');
require_once(dirname(__FILE__).'/Exception/InternalServerError.php');
require_once(dirname(__FILE__).'/Exception/MethodNotAllowed.php');
require_once(dirname(__FILE__).'/Exception/NotFound.php');
require_once(dirname(__FILE__).'/Exception/Unauthorized.php');
require_once(dirname(__FILE__).'/Config.php');
require_once(dirname(__FILE__).'/RequestHandler.php');
require_once(dirname(__FILE__).'/Response.php');

class Helper
{
	public static function requiredParam($name, $var)
	{
		if (empty($var)) {
			throw new BadRequestException("Missing required argument: ".$name, 400);
		}
	}

	public static function requiredParamInArray($arr, $key)
	{
		$var = null;

		if (is_array($arr) && isset($arr[$key])) {
			$var = $arr[$key];
		}

		self::requiredParam($key, $var);
	}

	private static function prepareRequest($path, $params = array(), $headers = array())
	{
		$url = Config::URL.$path;
		$request = RequestHandler::createRequest($url);
		$request->setParams($params);
		$request->setHeaders($headers);
		return $request;
	}

	public static function sendPostRequest($path, $params = array(), $headers = array())
	{
		$request = self::prepareRequest($path, $params, $headers);
		return $request->post();
	}

	public static function sendGetRequest($path, $params = array(), $headers = array())
	{
		$request = self::prepareRequest($path, $params, $headers);
		return $request->get();
	}

	public static function validateResponse($response)
	{
		if (!$response instanceof Response) {
			throw new MethodNotAllowedException();
		}

		$code = (int)$response->getHttpStatus();
		$error = $response->getBodyParam('error');
		$errorMessage = $error&&isset($error['message'])?$error['message']:null;

		//sometimes 'error' is just a string
		if ($error && !$errorMessage) {
			$errorMessage = $error;
		}

		switch ($code) {
			case 405:
				throw new MethodNotAllowedException($errorMessage, $code);
			case 400:
				throw new BadRequestException($errorMessage, $code);
			case 404:
				throw new NotFoundException($errorMessage, $code);
			case 500:
				throw new InternalServerErrorException($errorMessage, $code);
			case 403:
				throw new ForbiddenException($errorMessage, $code);
			case 401:
				throw new UnauthorizedException($errorMessage, $code);
		}
	}
}
