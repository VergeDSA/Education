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
/*
 * Psr4AutoloaderClass starts
 */
$loader = require __DIR__ . '/../vendor/autoload.php';
//echo __DIR__;
$loader->add('Config\\', __DIR__ . '/../');
$router = new Config\Router();
$router->execute();

