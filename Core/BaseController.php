<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:16
 */
namespace MainWebSite {

    class BaseController
    {
        public $model;
        public $view;
        protected $controller;
        protected $modelBaseName;

        public function __construct($model)
        {
            $this->controller = ucwords(__CLASS__);
            $this->modelBaseName = $model;

            $this->view = new BaseView(BASE_PATH . D_VIEW . $this->modelBaseName . '.php');
        }

        function index() {}


        /*function __construct2()
        {
            $this->view = new BaseView();
        }
        protected function _setModel($modelName)
        {
            $this->model = new $modelName();
        }

        protected function _setView($viewName)
        {
            $this->view = new BaseView(BASE_PATH . 'Views' . DS . strtolower($this->modelBaseName) . '.php');
        }*/
    }
}
