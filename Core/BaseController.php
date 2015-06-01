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
            $this->view->set('site_title', 'Alice Drive');

            if (isset($_POST['LoginButtonClick'])) {
                $result = $this->Login();
                if ($result === true) {
                    header('Location: /');
                    exit();
                }
                else $this->view->set('message', $result);
            }

            if (isset($_POST['SearchButtonClick'])){
                header('Location: /search');
            }

        }

        function index() {}

        function CheckLogin()
        {
            return $this->model->CheckLogin();
        }

        function Login()
        {
            if (isset($_POST['username'], $_POST['p'])) {
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = $_POST['p']; // The hashed password.

                if ($this->model->Login($username, $password)) {
                    return true;
                } else {
                    return '<p class="error">Вы что-то явно ввели не так...</p>';
                }
            } else {
                // The correct POST variables were not sent to this page.
                return 'Что-то пошло не так. Работаем...';
            }
        }

        function Logout()
        {
            include_once BASE_PATH . '/config/functions.php';

            // Unset all session values
            $_SESSION = array();
            // get session parameters
            $params = session_get_cookie_params();
            // Delete the actual cookie.
            setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

            // Destroy session
            session_destroy();
            header("Location: /user");
            exit();
        }

    }
}
