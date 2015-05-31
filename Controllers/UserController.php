<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 27.05.2015
 * Time: 15:12
 */

namespace MainWebSite;

use Exception;

class UserController extends BaseController
{
    function index()
    {
        try {
            if ($this->CheckLogin()) {
                header("Location: /user/account");
            }
            $this->view->set('header', 'Присоединяйся к нам');
            $this->view->set('page_title', 'Registration');

            if (isset($_POST['RegistrationButtonClick'])) {
                $this->view->set('message', $this->model->RegUser());
            }
            if (isset($_POST['LoginButtonClick'])) {
                $result = $this->Login();
                if ($result === true) {
//                    echo '<script>alert("username = ' . $username .' password = ' . $password . '");</script>';
                    header('Location: /');
                    exit();
                }
                else $this->view->set('message', $result);
            }
            $this->view->output('UserView.php');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    function account()
    {
        try {
            if (!$this->CheckLogin()) {
                header("Location: /user");
            }
            if (isset($_POST['LogoutButtonClick'])) {
                $this->Logout();
            }

            $this->view->set('header', 'Личный кабинет');
            $this->view->set('page_title', 'Account');

            if(isset($_POST['SaveChangesButtonClick'])){
                $this->view->set('message', $this->model->UpdateUser());
            }

            if(isset($_POST['SavePasswordChangesButtonClick'])){
                $this->view->set('message', $this->model->UpdatePassword());
            }

            $info = $this->model->GetUserInfo();
            if($info === false) {
                $this->view->set('message', 'Ошибка в получении данных');
            }
            else{
                $this->view->set('username', $_SESSION['username']);
                $this->view->set('firstname', $info['firstname']);
                $this->view->set('lastname', $info['lastname']);
                $this->view->set('email', $info['email']);
            }

            $this->view->output('AccountView.php');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}