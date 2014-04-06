<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 19:46
 */
class ParameterParser
{

	private $parameters;

	public function __construct()
	{
		$this->parameters = Parameter::getInstance();
	}

	public function get($key)
	{
		return (isset($this->parameters->$key)) ? $this->parameters->$key : false;
	}

	public function set($key, $value)
	{
		$this->parameters->$key = $value;
	}

	public function getAll()
	{
		return get_object_vars($this->parameters);
	}

	public function parse($data)
	{
		$i = 0;
		foreach ($data as $value) {
			$this->parameters->$value = (!empty($data[$i + 1])) ? $data[$i + 1] : false;
			$i++;
		}
		return $this;
	}
} 