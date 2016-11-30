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
require_once '../config/loader.php';
$router = new Config\Router();
$router->execute();


