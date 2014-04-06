<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 16:27
 */
class Config
{
	private $path;
	private $settings;

	public function __construct($config_type)
	{
		$path = __FILE__;
		$path = str_replace('library', 'config', $path);
		$this->path = $path . '/' . $config_type . '.ini';
		$this->readConfig();
	}

	public function getGroup($group)
	{
		return;
	}

	public function getValue($key, $group = false)
	{
		return;
	}

	private function readConfig()
	{
		$this->settings = parse_ini_file($this->path, true);
	}
} 