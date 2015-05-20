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

            $modelName = __NAMESPACE__ . DS . ucwords($this->controller) . 'Model';
            $this->model = new $modelName();

            $this->view = new BaseView(ADMIN_PATH . ADMIN_VIEW . $this->viewFileName);

            $this->view->set("header", ucwords($this->controller) . " Editor");
        }

        function index() {}

        function uploadImage($path)
        {
            $fileType = $_FILES["file"]["type"];

            if (($fileType == "image/gif")  ||
                ($fileType == "image/jpeg") ||
                ($fileType == "image/jpg")  ||
                ($fileType == "image/png"))
            {
                //Check if file exists
                if (file_exists(IMAGES . $path . $_FILES["file"]["name"])) {
                    echo "File already exists";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], IMAGES . $path . DS . $_FILES["file"]["name"]);
                    echo "Uploaded in " . IMAGES . $path . $_FILES["file"]["name"];
                }
            }
        }

        function GetPageData($param, $value)
        {
            $cond = "$param = $value";
            return $this->model->getRowByParam($cond);
        }
    }
}
