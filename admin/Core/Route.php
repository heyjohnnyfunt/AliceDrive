<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 10.04.2015
 * Time: 22:45
 */

namespace Admin
{
    class Route
    {
        protected $controller = 'Default';
        protected $params = array();
        protected $namespace = __NAMESPACE__;
        protected $method = 'index';

        public function __construct($user)
        {
            $url = $this->parse_path();

            if (isset($url['page']) && file_exists(ADMIN_PATH . ADMIN_CONTROLLER . $url['page'] . 'Controller' . '.php')
            && $url['page'] != 'page') {
                $this->controller = $url['page'];
            }

            // Model
            $modelName = ucwords($this->controller) . 'Model';
            $modelPath = ADMIN_PATH . ADMIN_MODEL . $modelName . '.php';
            if (file_exists($modelPath)) {
                require_once ADMIN_PATH . ADMIN_MODEL . $modelName . '.php';
            }

            // Controller
            $controllerName = ucwords($this->controller) . 'Controller';
            require_once ADMIN_PATH . ADMIN_CONTROLLER . $controllerName . '.php';

            // To use dynamic name of controller:
            $controllerName = $this->namespace . DS . $controllerName;
            $this->controller = new $controllerName(ucwords($this->controller), $user);

            // Params
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        function parse_path()
        {
            $path = array();

            if (isset($_SERVER['REQUEST_URI'])) {
                $request_path = explode('?', $_SERVER['REQUEST_URI']);
                $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');

                if (isset($request_path[1]))
                {
                    $path['call'] = utf8_decode(urldecode($request_path[1]));

                    // to erase 'index.php' string from url
                    if ($path['call'] == basename($_SERVER['PHP_SELF']))
                        $path['call'] = '';

                    $params = explode('&', $path['call']);

                    // get ?page=
                    if (isset($params[0]))
                    {
                        $pageName = explode('=', $params[0]);
                        if ($pageName[0] == 'page' && !empty($pageName[1])) {
                            $path['page'] = $pageName[1];
                        }

                        /*// get &id=
                        if (isset($params[1])) {
                            $pageItem = explode('=', $params[1]);
                            if ($pageItem[0] == 'id' && !empty($pageItem[1])) {
                                $path['id'] = $pageItem[1];
                            }
                        }*/
                    }
                }
            }
            return $path;
        }
    }
}
