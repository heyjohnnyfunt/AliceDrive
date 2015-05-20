<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 03.04.2015
 * Time: 1:57
 */

namespace Admin;
use Exception;

class NewsController extends BaseController
{
    /*public function __construct($controller = null, $user = null)
    {
        if ($controller != null) parent::__construct($controller, $user);
        $this->model = new NewsModel();
    }*/

    public function index()
    {
        try {
            $newsTopics = $this->GetTopics();
            $this->view->set('newsTopics', $newsTopics);

            $this->view->set('page_title', 'News');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->set('currentUser', $this->user);

            if (isset($_GET['id'])) {
                $newsItem = $this->GetPageData('id', $_GET['id']);
                $this->view->set('newsItem', $newsItem);
            }

            if (isset($_GET['delete'])) {
                if ($this->DeleteNews($_GET['delete']))
                    $this->view->set('message', 'Topic was deleted');
                else
                    $this->view->set('message', 'Error while deleting.');
            }

            if (isset($_POST['SaveButtonClick'])) {
                if(isset($_GET['id']))
                    $this->view->set('message',  $this->InsertNews($_GET['id']));
                else
                    $this->view->set('message',  $this->InsertNews());
            }

            $this->view->output($this->viewFileName);

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    function InsertNews($id = null)
    {
        return $this->model->InsertUpdate($id);
    }

    function DeleteNews($id)
    {
        return $this->model->Delete("news", $id);
    }

    function GetTopics()
    {
        return $this->model->GetMenu();
    }

}
