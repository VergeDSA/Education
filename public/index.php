<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.11.16
 * Time: 15:35
 */

/*
 * Error output enabled
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
ini_set('session.save_path',__DIR__.'/../sess');
ini_set('session.gc_probability', 100);
ini_set('session.gc_maxlifetime', 10);
define('ROOT_FOLDER',__DIR__ . '/..');
$loader = require ROOT_FOLDER.'/vendor/autoload.php';
//$loader->add('config\\', __DIR__ . '/../');
$router = new Config\Router();
$router->execute();

//ob_start();
//print_r($_COOKIE);
//echo session_save_path();
//$ob_output=ob_get_clean();
//session_start();
//Config\SessionClass::start();
//echo $ob_output;
//die;


