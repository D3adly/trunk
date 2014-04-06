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
		$path = str_replace('library/Config.php', 'config', $path);
		$this->path = $path . '/' . $config_type . '.ini';
		$this->readConfig();
		var_dump($this->settings);
	}

	public function getGroup($group)
	{
		return (isset($this->settings[$group])) ? $this->settings[$group] : false;
	}

	public function getValue($key, $group = 'main_settings_section')
	{
		return (isset($this->settings[$group][$key])) ? $this->settings[$group][$key] : false;
	}

	private function readConfig()
	{
		$this->settings = parse_ini_file($this->path, true);
	}
} 