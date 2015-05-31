<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 31.05.2015
 * Time: 20:29
 */

namespace MainWebSite;

use Exception;

class CommunityController extends BaseController
{
    function index()
    {
        try {
            $this->view->set('header', 'Чатим здесь');
            $this->view->set('page_title', 'Community');

            if (!$this->CheckLogin()) {
                $this->view->output('UserView.php');
                return;
            }

            if (isset($_POST['SendMessageButtonClick'])) {
                $this->view->set('message', $this->model->PostMessage());
            }

            $articles = $this->model->get_data();
            $this->view->set('articles', $articles);
            $this->view->output('CommunityView.php');


        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}