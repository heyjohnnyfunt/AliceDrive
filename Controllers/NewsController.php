<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 10.04.2015
 * Time: 0:12
 */
namespace MainWebSite {
    use Exception;

    class NewsController extends BaseController
    {
        public function __construct($model)
        {
//            require_once BASE_PATH . D_MODEL . 'NewsModel.php';
            parent::__construct($model);
//            $this->_setModel($model);
            $this->model = new NewsModel();
        }

        public function index()
        {
            try
            {
                $articles = $this->model->get_data();
                $this->view->set('articles', $articles);

                $this->view->set('header', 'Что у нас нового');
                $this->view->set('page_title', 'News');
                $this->view->set('site_title', 'Alice Drive');

                $this->view->output('NewsView.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

        public function topic($articleId)
        {
            try {

                $article = $this->model->getArticleById($articleId);

                if ($article)
                {
                    $this->view->set('page_title', $article['title']);
                    $this->view->set('site_title', 'Alice Drive');

                    $this->view->set('header', $article['title']);
                    $this->view->set('date', $article['date']);
                    $this->view->set('body', $article['body']);
                }
                else
                {
                    $this->view->set('page_title', 'News');
                    $this->view->set('site_title', 'Alice Drive');
                    $this->view->set('date', '12.12.12');
                    $this->view->set('header', 'Мысли успешных людей');
                    $this->view->set('body', 'Не все могут прочесть эту новость.
                    Точнее, не только лишь все. Не каждый может это сделать..');
                }

                return $this->view->output('TopicView.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

    }
}
