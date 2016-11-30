<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.11.16
 * Time: 17:05
 */
require_once '../config/Psr4AutoloaderClass.php';
$loader = new Config\Psr4AutoloaderClass();
// register the autoloader
$loader->register();
// register the base directories for the namespace prefix
$loader->addNamespace('App', '../app');
$loader->addNamespace('Config', '../config');