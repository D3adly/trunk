<?php

/**
 * Singleton class implementation
 * You can extend your class by this one if you want to use Singleton pattern
 */
abstract class Singleton
{

	/**
	 * These are the private methods which are prevents the children against copying/executing. Please leave them empty.
	 */
	private function __construct()
	{
	}

	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

	/**
	 * Static method to check if the object is already created
	 * If so, method returns already existing object, otherwise new instance needs to be created and returned
	 *
	 * @staticvar null $instance
	 * @return \choldren Object
	 */
	final public static function getInstance()
	{
		static $instance = null;

		$calledClass = get_called_class();

		if ($instance === null) {
			$instance = new $calledClass;
		}
		return $instance;
	}
}