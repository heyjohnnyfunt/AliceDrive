<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 01.06.2015
 * Time: 15:04
 */

namespace MainWebSite;
use Exception;

class SearchController extends BaseController
{
    function index()
    {
        try {
            $this->view->set('header', 'Поиск');
            $this->view->set('page_title', 'Search');

            if(isset($_POST['SearchResultButtonClick'])){
                $this->view->set('header', 'Результат поиска по запросу: ' . filter_input(INPUT_POST, 'searchInput', FILTER_SANITIZE_EMAIL));
                $this->view->set('articles',$this->model->SearchNews());
                $this->view->set('concerts',$this->model->SearchTours());
                $this->view->set('songs',$this->model->SearchMusic());
            }
            else{
                $this->view->set('articles', 0);
                $this->view->set('concerts', 0);
                $this->view->set('songs', 0);
            }

            $this->view->output('SearchView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

}