<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 17:08
 */
class SessionHandler extends Singleton
{

	public function register()
	{
		session_start();
	}

	public function set($key, $value)
	{
		$_SESSION[$key] = $_SESSION[$value];
	}

	public function get($key)
	{
		return ($_SESSION[$key]) ? $_SESSION[$key] : false;
	}

	public function remove($key)
	{
		unset($key);
	}
} 