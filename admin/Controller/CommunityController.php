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
        public function __construct($model = null, $user = null)
        {
            if ($model != null) parent::__construct($model, $user);
            $this->model = new CommunityModel();
        }

        public function index()
        {
            try {
                $userArray = $this->GetAllUsernames();
                $this->view->set('userArray', $userArray);
                $this->view->set('page_title', 'News');
                $this->view->set('site_title', 'Alice Drive');
                $this->view->set('currentUser',$this->user);

                if (isset($_GET['id']))
                {
                    $userItem = $this->GetUser('id', $_GET['id']);
                    $this->view->set('userItem', $userItem);
                }

                $this->view->output('CommunityView.php', 'Template.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

        function InsertUser($id = null)
        {
            return $this->model->InsertUpdate($id);
        }

        function GetAllUsernames()
        {
            return $this->model->GetUsernamesFromDatabase();
        }

        function GetUser($param, $value)
        {
            $cond = "$param = $value";
            return $this->model->getRowByParam($cond);
        }
    }
}