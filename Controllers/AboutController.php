<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 06.05.2015
 * Time: 1:19
 */

namespace MainWebSite;
use Exception;

class AboutController extends BaseController {
    public function __construct($model)
    {
        parent::__construct($model);
        $this->model = new AboutModel();
    }

    public function index()
    {
        try
        {
            $memberList = $this->model->get_data();
            $this->view->set('memberList', $memberList);

            $mainDesc = $this->model->get_main_description();
            $this->view->set('mainDesc',$mainDesc);

            $this->view->set('header', 'ALICE DRIVE');
            $this->view->set('page_title', 'About');
            $this->view->set('site_title', 'Alice Drive');

            $this->view->output('AboutView.php', 'pageTemplate.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

}