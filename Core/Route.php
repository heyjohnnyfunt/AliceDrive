<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 10.04.2015
 * Time: 22:45
 */

namespace MainWebSite{
    defined('ACCESS_ALLOWED') or die('Restricted Access');
    class Route
    {
        protected $controller = 'News';
        protected $params = array();
        protected $namespace = __NAMESPACE__;
        protected $method = 'index';

        public function __construct()
        {
            $url = explode('/', $_SERVER['REQUEST_URI']);
            unset($url[0]);

            if (file_exists(BASE_PATH . D_CONTROLLER . $url[1] . 'Controller' . '.php')) {
                $this->controller = $url[1];
                unset($url[1]);
            }

            // Model
            $modelName = ucwords($this->controller) . 'Model';
            $modelPath = BASE_PATH . D_MODEL . $modelName . '.php';
            if (file_exists($modelPath)) {
                include BASE_PATH . D_MODEL . $modelName . '.php';;
            }

            // Controller
            $controllerName =  ucwords($this->controller) . 'Controller';
            //$viewName = ucwords($this->controller) . 'View';
            require_once BASE_PATH . D_CONTROLLER . $controllerName . '.php';

            // To use dynamic name of controller:
            $controllerName = $this->namespace . DS . $controllerName;
            $this->controller = new $controllerName($this->controller);

            // Method
            if (isset($url[2]))
            {
                if (method_exists($this->controller, $url[2]))
                {
                    $this->method = $url[2];
                    unset($url[2]);
                }
            }

            // Params
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }
    }
}
