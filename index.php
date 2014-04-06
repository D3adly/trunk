<?php
/**
 * Created by PhpStorm.
 * User: auris
 * Date: 06/04/14
 * Time: 16:11
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'library/Autoloader.php';
$loader = new Solarium\Autoloader();
$loader->register();
$core = new Core();
$core->loadPage();