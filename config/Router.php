<?php

namespace Config;

class Router
{
    private $routes = array();
    private $uri;

    public function __construct()
    {
        $this->routes = include ROOT_FOLDER.'/config/routes.php';
        $this->uri = $this::getUri();
//        SessionClass::start();
    }

    private static function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function execute()
    {
        foreach ($this->routes as $pattern => $path) {
            if (preg_match("~$pattern~", $this->uri)) {
                $path = preg_replace("~$pattern~", $path, $this->uri);
                $parse_path = explode('/', $path);
                $controller_name = '\App\Http\Controllers\\'.ucfirst(array_shift($parse_path)).'Controller';
                $method_name = 'action'.ucfirst(array_shift($parse_path));
                if (count($parse_path)>0) {
                    $class = new $controller_name();
                    call_user_func_array(array($class, $method_name), $parse_path);
                } else {
                    $class = new $controller_name();
                    $class->$method_name();
                }
                break(1);
            }
        }

//        print_r($this->routes);
//        echo 'Test Router';
    }
}
