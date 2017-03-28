<?php

/**
*
*/
class SGCallback
{
	private $className;
	private $methodName;
	private $params;

	function __construct($className, $methodName, $params = array())
	{
		$this->className = $className;
		$this->methodName = $methodName;
		$this->params = $params;
	}

	public function canPerform()
	{
		if (class_exists($this->className)) {

			$callbackClass = $this->className;
			$sgCallback = new $callbackClass();

			if (method_exists($sgCallback, $this->methodName)) {
				return true;
			}

			return false;
		}

		return false;
	}

	public function perform()
	{
		$callbackClass = $this->className;
		$methodName = $this->methodName;

		$obj = new $callbackClass();
		$obj->$methodName($this->params);
	}

	public function toString()
	{
		return json_encode(array(
			'class' => $this->className,
			'method' => $this->methodName,
			'params' => $this->params
		));
	}
}
