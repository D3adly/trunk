<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 19:17
 */
class Controller_Manager extends AbstractController
{
	public function index()
	{

	}

	public function login()
	{
		echo 'login_page';
		var_dump($this->params->getAll());
	}
} 