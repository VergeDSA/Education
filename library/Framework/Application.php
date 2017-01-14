<?php
/**
 * Created by PhpStorm.
 * User: vergedsa
 * Date: 26.12.16
 * Time: 1:56
 */

namespace Library\Framework;

class Application
{
    public $sapi;

    public function __construct()
    {
        $this->sapi = php_sapi_name();
    }

    public function run()
    {
        if ('cli' == $this->sapi) {
            echo 'Запуск из командной строки';
        } elseif ('cgi' == substr($this->sapi, 0, 3)) {
            echo 'Запуск в режиме CGI';
        } elseif ('apache' == substr($this->sapi, 0, 6)) {
            $router = new Router();
            $path_finder = $router->execute();

            if (count($path_finder['params_array'])>0) {
                $class = new $path_finder['controller_name']();
                call_user_func_array(array($class, $path_finder['method_name']), $path_finder['params_array']);
            } else {
                $class = new $path_finder['controller_name']();
                $class->{$path_finder['method_name']}();
            }
        } else {
            echo 'Запуск в режиме модуля сервера '.$this->sapi;
        }
    }
}
