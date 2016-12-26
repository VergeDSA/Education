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
define('ROOT_FOLDER', __DIR__ . '/..');
ini_set('session.save_path', ROOT_FOLDER . '/data/sessions');
ini_set('session.gc_probability', 100);
ini_set('session.gc_maxlifetime', 10);

$loader = require ROOT_FOLDER.'/vendor/autoload.php';
//$loader->add('config\\', __DIR__ . '/../');
$app = new App\Controllers\Application();
$app->run();
//ob_start();
//print_r($_COOKIE);
//echo session_save_path();
//$ob_output=ob_get_clean();
//session_start();
//Config\SessionClass::start();
//echo $ob_output;
//die;
