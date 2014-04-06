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
	public $controller_name;
	public $action;
	public $view;
	public $params;
	public $q_string;

	public function __construct()
	{
		$this->config = new Config('app');
		$this->parseUrl();
		$this->view = new Renderer($this);
		$this->controller = new $this->controller($this);
		$this->controller->{$this->action}();
	}

	public function loadPage()
	{
		$this->view->render();
	}

	private function parseUrl()
	{
		$this->q_string = '*';
		$this->controller_name = ucwords(strtolower((!empty($_GET['ct'])) ? $_GET['ct'] : 'index'));
		$this->controller = 'Controller_' . $this->controller_name;
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
			$this->controller_name = 'Index';
			$this->controller = 'Controller_' . $this->controller_name;
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