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
        protected $modelBaseName;

        public function __construct($model, $username)
        {
            $this->controller = ucwords(__CLASS__);
            $this->modelBaseName = $model;
            $this->user = $username;

            $this->view = new BaseView(ADMIN_PATH . ADMIN_VIEW . $this->modelBaseName . '.php');
        }

        function index() {}

    }
}
