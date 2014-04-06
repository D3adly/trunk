<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 16:20
 */
class Core
{
	public $controller;
	public $action;
	public $view;
	public $params;
	public $q_string;

	public function __construct()
	{
		$this->config = new Config('app');
		$this->parseUrl();
		$this->controller = new $this->controller($this);
		$this->controller->{$this->action}();
	}

	public function loadPage()
	{

	}

	private function parseUrl()
	{
		$this->q_string = '*';
		$this->controller = 'Controller_' . ucwords(strtolower((!empty($_GET['ct'])) ? $_GET['ct'] : 'index'));
		if (isset($_GET['rq'])) {
			$path = explode('/', $_GET['rq']);
			array_shift($path);

		}
		$this->action = strtolower(((!empty($path[0])) ? $path[0] : 'index'));
		if (!method_exists($this->controller, $this->action)) {
			$this->q_string = $this->action;
			$this->action = 'index';
		}
		if (!class_exists($this->controller)) {
			$this->controller = 'Controller_Index';
		};
		if (!empty($path)) {
			array_shift($path);
			if (!empty($path)) {
				$path_parser = new ParameterParser();
				$this->params = $path_parser->parse($path);
			}
		}
	}
} 