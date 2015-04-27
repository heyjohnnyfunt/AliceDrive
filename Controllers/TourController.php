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
        public function __construct($model)
        {
            parent::__construct($model);
            $this->model = new TourModel();
        }

        public function index()
        {
            try {
                $articles = $this->model->get_data();
                $lastConcert = $this->model->GetLastRecord();
                $this->view->set('articles', $articles);
                $this->view->set('lastConcert', $lastConcert);
                $this->view->set('page_title', 'Tours');
                $this->view->set('site_title', 'Alice Drive');

                $this->view->output('TourView.php', 'pageTemplate.php');

            } catch (Exception $e) {
                echo "Application error:" . $e->getMessage();
            }
        }

    }
}