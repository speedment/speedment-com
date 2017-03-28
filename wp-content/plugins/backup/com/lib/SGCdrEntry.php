<?php

require_once(dirname(__FILE__).'/SGEntry.php');

/**
*
*/
class SGCdrEntry implements SGEntry
{
	private $name;
	private $offset;
	private $path;
	private $type;
	private $size;

	public function __construct()
	{
		$this->type = SG_ENTRY_TYPE_CDR;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getOffset()
	{
		return $this->offset;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setOffset($offset)
	{
		$this->offset = $offset;
	}

	public function setPath($path)
	{
		$this->path = $path;
	}

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function toArray()
	{
		$cdrEntry = array(
			'name' => $this->getName(),
			'offset' => $this->getOffset(),
			'path' => $this->getPath(),
			'type' => $this->getType(),
			'size' => $this->getSize()
		);

		return $cdrEntry;
	}
}
