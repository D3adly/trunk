<?php

/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 17:25
 */
class Authenticator
{
	private $session;

	public function __construct()
	{
		$this->session = SessionHandler::getInstance();
	}

	public function registerOwner($owner_id)
	{
		$this->session->set('owner', $owner_id);
	}

	public function getOwner()
	{
		return $this->session->get('owner');
	}

	public function removeOwner()
	{
		$this->session->remove('owner');
	}
} 