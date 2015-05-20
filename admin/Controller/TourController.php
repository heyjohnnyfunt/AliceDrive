<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 02.05.2015
 * Time: 21:53
 */

namespace Admin;
use Exception;

class TourController extends BaseController
{
    /*public function __construct($controller = null, $user = null)
    {
        if ($controller != null) parent::__construct($controller, $user);
        $this->model = new TourModel();
    }*/

    public function index()
    {
        try {
            $tourTopics = $this->GetTopics();
            $this->view->set('tourTopics', $tourTopics);

            $this->view->set('page_title', 'Tours');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->set('currentUser',$this->user);

            if (isset($_GET['id']))
            {
                $tourItem = $this->GetPageData('id', $_GET['id']);
                $this->view->set('tourItem', $tourItem);
            }

            if (isset($_GET['delete'])){
                if($this->DeleteTour($_GET['delete']))
                    $this->view->set('message', 'Topic was deleted');
                else
                    $this->view->set('message', 'Error while deleting.');
            }

            if (isset($_POST['SaveButtonClick'])) {
                if(isset($_GET['id']))
                    $this->view->set('message',  $this->InsertTour($_GET['id']));
                else
                    $this->view->set('message',  $this->InsertTour());
            }

            $this->view->output('TourView.php', 'Template.php');

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    function InsertTour($id = null)
    {
        return $this->model->InsertUpdate($id);
    }

    function DeleteTour($id)
    {
        return $this->model->Delete("tours", $id);
    }

    function GetTopics()
    {
        return $this->model->GetMenu();
    }

}