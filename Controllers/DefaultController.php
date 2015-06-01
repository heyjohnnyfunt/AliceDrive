<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 01.06.2015
 * Time: 23:52
 */

namespace MainWebSite;
use Exception;

class DefaultController extends BaseController{
    public function index()
    {
        try
        {
            $articles = $this->model->get_data();
            $this->view->set('articles', $articles);

            $this->view->set('header', 'Что у нас нового');
            $this->view->set('page_title', 'News');

            $this->view->output('NewsView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}