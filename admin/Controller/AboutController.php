<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 05.05.2015
 * Time: 21:00
 */

namespace Admin;
use Exception;

class AboutController extends BaseController {

    /*public function __construct($controller = null, $user = null)
    {
        if ($controller != null) parent::__construct($controller, $user);
        $this->model = new AboutModel();
    }*/

    public function index()
    {
        try {
            $memberList = $this->GetMemberList();
            $this->view->set('memberList', $memberList);

            $this->view->set('page_title', 'About');
            $this->view->set('site_title', 'Alice Drive');
            $this->view->set('currentUser', $this->user);

            if (isset($_GET['id'])) {
                $member = $this->GetPageData('id', $_GET['id']);
                $this->view->set('member', $member);

                $imageList = $this->GetImageList($member);
                $this->view->set('imageList', $imageList);
            }
            else{
                $imageList = $this->GetImageList();
                $this->view->set('imageList', $imageList);
            }

            if (isset($_GET['delete'])) {
                if ($this->DeleteMember($_GET['delete']))
                    $this->view->set('message', 'Topic was deleted');
                else
                    $this->view->set('message', 'Error while deleting.');
            }

            if (isset($_POST['SaveButtonClick'])) {
                if(isset($_GET['id']))
                    $this->view->set('message',  $this->InsertMember($_GET['id']));
                else
                    $this->view->set('message',  $this->InsertMember());
            }

            $this->view->output($this->viewFileName);

        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    function InsertMember($id = null)
    {
        return $this->model->InsertUpdate($id);
    }

    function DeleteMember($id)
    {
        return $this->model->Delete("about", $id);
    }

    function GetMemberList()
    {
        return $this->model->GetMenu();
    }

    function GetImageList($member = null)
    {
        //Select folder to scan
        $handle = opendir(IMAGES . "Band");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray, $member);
        return $result;
    }

    function CreateOptionValues(array $valueArray, $member = null) {
        $result = "";

        foreach ($valueArray as $value) {
            $result .= "<option value='$value'";
            if ($member['image'] == $value)
                $result.=" selected";
            $result .= ">$value</option>";
        }

        return $result;
    }
}