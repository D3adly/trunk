<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 20:16
 */
class Renderer
{
	const TEMPLATE_PATH = './app/frame/';
	const VIEW_PATH = './app/View/';
	const HTML_MAIN = 'main.phtml';
	const JSON_MAIN = 'json.phtml';
	const BLANK = 'blank.phtml';
	const HTML = 'text/html'; //@todo: set correct headers
	const JSON = 'application/json';
	const STREAM = 'text/html';

	private $view_type = self::HTML;
	private $frame = self::HTML_MAIN;
	private $view = 'fallback/blank';
	private $view_fallback = 'fallback/blank';

	public function __construct($core)
	{
		$this->controller = $core->controller;
		$this->action = $core->action;
		$this->config = $core->config;
		$this->params = $core->params;
	}

	public function render()
	{
		switch ($this->view_type) {
			case self::HTML:
				$frame = self::TEMPLATE_PATH . self::HTML_MAIN;
				break;
			case self::JSON:
				$frame = self::TEMPLATE_PATH . self::JSON_MAIN;
				break;
			case self::STREAM:
				$frame = self::TEMPLATE_PATH . self::BLANK;
				break;
			default:
				$frame = self::TEMPLATE_PATH . self::BLANK;
				break;
		}
		include $frame;
	}

	public function setViewType($type)
	{
		$this->view_type = $type;
	}

	public function setFrame($frame)
	{
		$this->frame = $frame;
	}

	public function setView($view)
	{
		$this->view = $view;
	}

	public function loadView()
	{
		$view_file = self::VIEW_PATH . $this->view . '.phtml';
		include (file_exists($view_file)) ? $view_file : self::VIEW_PATH . $this->view_fallback . '.phtml';
	}
	//@todo: create methods for output setting

} 