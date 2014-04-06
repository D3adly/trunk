<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 17:42
 */
class AbstractController
{

	public function __construct($core)
	{
		$this->controller = $core->controller;
		$this->action = $core->action;
		$this->config = $core->config;
		$this->view = $core->view;
		$this->params = $core->params;
		$this->controller_name = $core->controller_name;
		$this->setView();
	}

	private function setView()
	{
		$this->view->setView($this->controller_name . '/' . $this->action);
	}

} 