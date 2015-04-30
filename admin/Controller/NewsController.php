<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 03.04.2015
 * Time: 1:57
 */

namespace Admin {
    use Exception;

    class NewsController extends BaseController
    {
        public function __construct($model = null, $user = null)
        {
            if ($model != null) parent::__construct($model, $user);
            $this->model = new NewsModel();
        }

        public function index()
        {
            try {
                $newsTopics = $this->GetTopics();
                $this->view->set('newsTopics', $newsTopics);
                $this->view->set('page_title', 'News');
                $this->view->set('site_title', 'Alice Drive');
                $this->view->set('currentUser',$this->user);

                if (isset($_GET['id']))
                {
                    $newsItem = $this->GetPageData('id', $_GET['id']);
                    $this->view->set('newsItem', $newsItem);

                    if (isset($_GET['delete'])){
                        if($this->DeleteNews($_GET['delete']))
                            $this->view->set('message', 'Topic was deleted');
                        else
                            $this->view->set('message', 'Error while deleting.');
                    }
                }

                $this->view->output('NewsView.php', 'Template.php');

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
            return $this->model->Delete($id);
        }

        function GetTopics()
        {
            return $this->model->get_data();
        }

        function GetPageData($param, $value)
        {
            $cond = "$param = $value";
            return $this->model->getRowByParam($cond);
        }
    }
}