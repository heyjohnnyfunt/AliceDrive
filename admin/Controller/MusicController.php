<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 20.05.2015
 * Time: 1:23
 */

namespace Admin;
use Exception;

class MusicController extends BaseController
{
    public function index()
    {
        try {
            $musicList = $this->GetMusicList();
            $this->view->set('musicList', $musicList);

            $this->view->set('page_title', 'Music');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->set('currentUser', $this->user);

            if (isset($_GET['id']))
            {
                $songItem = $this->GetPageData('id', $_GET['id']);
                $this->view->set('songItem', $songItem);
            }

            if (isset($_GET['delete'])){
                if($this->DeleteSong($_GET['delete']))
                    $this->view->set('message', 'User was deleted');
                else
                    $this->view->set('message', 'Error while deleting.');
            }

            if (isset($_POST['SaveButtonClick'])) {
                if(isset($_GET['id']))
                    $this->view->set('message',  $this->InsertSong($_GET['id']));
                else
                    $this->view->set('message',  $this->InsertSong());
            }

            $this->view->output($this->viewFileName);

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    function DeleteSong($id)
    {
        return $this->model->Delete("users", $id);
    }

    function InsertSong($id = null)
    {
        return $this->model->InsertUpdate($id);
    }

    function GetMusicList()
    {
        return $this->model->GetMenu();
    }

}