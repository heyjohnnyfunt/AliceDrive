<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 26.04.2015
 * Time: 1:17
 */

namespace Admin;
use Exception;

class DefaultController extends BaseController
{
    public function __construct($model = null, $user = null)
    {
        if ($model != null) parent::__construct($model, $user);
        $this->model = new DefaultModel();
    }

    public function index()
    {
        try {
            $menu = $this->model->GetMenuFromDatabase();
            $this->view->set('menuArray', $menu);
            $this->view->set('page_title', 'Admin');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->set('currentUser', $this->user);

            $this->view->output('DefaultView.php', 'Template.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

}