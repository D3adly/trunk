<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 16:20
 */
class Core
{
	private $controller;
	private $action;
	private $view;

	public function __construct()
	{
		echo 'core start';
		$config = new Config('app');
	}

	public function loadPage()
	{

	}
} 