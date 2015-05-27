<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 27.05.2015
 * Time: 15:12
 */

namespace MainWebSite;
use Exception;

class RegistrationController extends BaseController
{
    public function __construct($model)
    {
        parent::__construct($model);
        $this->model = new RegistrationModel();
    }

    function index()
    {
        try {
            $this->view->set('header', 'Присоединяйся к нам');
            $this->view->set('page_title', 'Registration');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->output('RegistrationView.php');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}