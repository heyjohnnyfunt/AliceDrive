<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 20.05.2015
 * Time: 2:59
 */

namespace MainWebSite;
use Exception;

class MusicController extends BaseController{
    public function __construct($model)
    {
        parent::__construct($model);
        $this->model = new MusicModel();
    }

    public function index()
    {
        try {
            $articles = $this->model->get_data();
            $this->view->set('articles', $articles);
            $this->view->set('header', 'Что играем');

            $this->view->set('page_title', 'Music');
            $this->view->set('site_title', 'Alice Drive');

            $this->view->output('MusicView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}