<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 07.04.2015
 * Time: 20:28
 */

namespace Admin {
    use Exception;

    class CommunityController extends BaseController
    {
       /* public function __construct($controller = null, $user = null)
        {
            if ($controller != null) parent::__construct($controller, $user);
            $this->model = new CommunityModel();
        }*/

        public function index()
        {
            try {
                $userArray = $this->GetAllUsers();
                $this->view->set('userArray', $userArray);
                $this->view->set('page_title', 'News');
                $this->view->set('site_title', 'Alice Drive');
                $this->view->set('currentUser',$this->user);

                if (isset($_GET['id']))
                {
                    $userItem = $this->GetUser('id', $_GET['id']);
                    $this->view->set('userItem', $userItem);
                }

                if (isset($_GET['delete'])){
                    if($this->DeleteUser($_GET['delete']))
                        $this->view->set('message', 'User was deleted');
                    else
                        $this->view->set('message', 'Error while deleting.');
                }

                if (isset($_POST['SaveButtonClick'])) {
                    if(isset($_GET['id']))
                        $this->view->set('message',  $this->InsertUser($_GET['id']));
                    else
                        $this->view->set('message',  $this->InsertUser());
                }

                $this->view->output($this->viewFileName);

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

        function DeleteUser($id)
        {
            return $this->model->Delete("users", $id);
        }

        function InsertUser($id = null)
        {
            return $this->model->InsertUpdate($id);
        }

        function GetAllUsers()
        {
            return $this->model->GetMenu();
        }

        function GetUser($param, $value)
        {
            $cond = "$param = $value";
            return $this->model->getRowByParam($cond);
        }
    }
}