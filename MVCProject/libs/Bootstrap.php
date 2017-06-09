<?php
// A part of the MVC dp, that run the project

class Bootstrap {
    function __construct() {
// constructor - dealing with the path of the project (htacces)
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $url=str_replace("/MVCProject", "", $url);
        $url = ltrim($url, '/');
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //print_r($url);

        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}($url[2]);
            } else {
                    $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
                    
    }
    // If there is an error, creating an object of class error, and show the error to the user
    function error() {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index();
        return false;
    }

}