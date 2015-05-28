<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:16
 */
namespace MainWebSite {
    defined('ACCESS_ALLOWED') or die('Restricted Access');

    class BaseController
    {
        public $model;
        public $view;
        protected $controller;
        protected $viewBaseName;

        public function __construct($controller)
        {
            $this->controller = ucwords($controller);
            $this->viewBaseName = $this->controller . 'View.php';

            $modelName = __NAMESPACE__ . DS . ucwords($this->controller) . 'Model';
            $this->model = new $modelName();

            $this->view = new BaseView(BASE_PATH . D_VIEW . $this->viewBaseName);

            if(isset($_POST['LoginButtonClick'])){
                if($this->model->CheckUser()){
                    header('Location: /user/account');
                };
            }
        }

        function index() {
        }
    }
}
