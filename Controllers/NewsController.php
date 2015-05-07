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

                $this->view->set('header', 'Новости');
                $this->view->set('page_title', 'News');
                $this->view->set('site_title', 'Alice Drive');

                $this->view->output('NewsView.php', 'pageTemplate.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

        public function topic($articleId)
        {
            try {

                $article = $this->model->getArticleById((int)$articleId);

                if ($article)
                {
                    $this->view->set('title', $article['title']);
                    $this->view->set('articleBody', $article['article']);
                    $this->view->set('datePublished', $article['date']);
                }
                else
                {
                    $this->view->set('title', 'Invalid article ID');
                    $this->view->set('noArticle', true);
                }

                return $this->view->output('TopicView.php', 'pageTemplate.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }
        /*function __construct2()
        {
            require_once BASE_PATH . D_MODEL . 'NewsModel.php';
            $this->model = new NewsModel();
            $this->view = new BaseView();
        }

        function index2()
        {
            $data = $this->model->get_data();
            $this->view->generate('NewsView.php', 'pageTemplate.php', $data);
        }*/
    }
}
