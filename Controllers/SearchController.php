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
                $this->view->set('header', 'Результат поиска');
                $this->view->set('articles',$this->model->SearchNews($_POST['searchInput']));
            }
            else{
                $this->view->set('articles', 0);
            }

            $this->view->output('SearchView.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

}