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
            if(isset($_SESSION['username'])){
                header("Location: /user/account");
            }

            $this->view->set('header', 'Присоединяйся к нам');
            $this->view->set('page_title', 'Registration');
            $this->view->set('site_title', 'Alice Drive');

            if(isset($_POST['RegistrationButtonClick'])){
                $this->view->set('message', $this->model->AddUser());
            }
            else if(isset($_POST['LoginButtonClick'])){
                if($this->model->CheckUser()){
                    header('Location: /user/account');
                };
            }

            $this->view->output('UserView.php');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    function account()
    {
        try {
            $this->view->set('header', 'Личный кабинет');
            $this->view->set('page_title', 'Account');
            $this->view->set('site_title', 'Alice Drive');

            $this->view->output('AccountView.php');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}