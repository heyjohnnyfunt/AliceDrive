<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:16
 */
namespace Admin {

    class BaseController
    {
        public $model;
        public $view;
        public $user;
        protected $controller;
        protected $viewFileName;

        public function __construct($controller, $username)
        {
            $this->controller = $controller;
            $this->viewFileName = $controller . 'View.php';
            $this->user = $username;

            $modelName = __NAMESPACE__ . DS .ucwords($this->controller) . 'Model';
            $this->model = new $modelName();

            $this->view = new BaseView(ADMIN_PATH . ADMIN_VIEW . $this->viewFileName);
        }

        function index() {}

    }
}
