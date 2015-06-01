<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 02.06.2015
 * Time: 1:27
 */

namespace MainWebSite;
use Exception;

class VideoController extends BaseController{

    public function index()
    {
        try {
            $articles = $this->model->get_data();
            $this->view->set('articles', $articles);
            $this->view->set('header', 'Визуализированное творчество');

            $this->view->set('page_title', 'Video');

            $this->view->output('VideoView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}