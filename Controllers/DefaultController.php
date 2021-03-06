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
            $articles = $this->model->GetNews();
            $this->view->set('articles', $articles);
            $concerts = $this->model->GetConcerts();
            $this->view->set('concerts', $concerts);
            $messages = $this->model->GetMessages();
            $this->view->set('messages', $messages);
            $songs = $this->model->GetMusic();
            $this->view->set('songs', $songs);
            $videos = $this->model->GetVideos();
            $this->view->set('videos', $videos);

            $this->view->set('header', 'WELCOME COMRADE!');
            $this->view->set('page_title', 'Home');

            $this->view->output('DefaultView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}