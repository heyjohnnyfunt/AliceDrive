<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 18.04.2015
 * Time: 22:33
 */

namespace MainWebSite {
    use Exception;

    class TourController extends BaseController
    {
        public function index()
        {
            try {
                $articles = $this->model->get_data();
                $lastConcert = $this->model->GetLastRecord();
                $this->view->set('articles', $articles);
                $this->view->set('lastConcert', $lastConcert);

                $this->view->set('header', 'Где нас можно услышать');
                $this->view->set('page_title', 'Tours');

                $this->view->output('TourView.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

    }
}