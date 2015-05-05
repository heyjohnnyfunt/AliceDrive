<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 23.03.2015
 * Time: 23:10
 */

namespace Admin {

    include(ADMIN_PATH . 'Model/PageModel.php');

    class PageController
    {
        function GetAllAdminUsers()
        {
            $adminPageModel = new PageModel();
            return $adminPageModel->GetAllAdminUsersFromDatabase();
        }

        function GetMenu()
        {
            $pageModel = new PageModel();
            return $pageModel->GetMenuFromDatabase();
        }

        function SetAdminUser($username, $password)
        {
            $adminPageModel = new PageModel();

            if(!empty($username)) $username = $this->test_input($username);

            if (!empty($password)) $password = $this->test_input($password);

            if ($adminPageModel->CheckAdminInDatabase($username, $password)) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                return true;
            } else return false;
        }

        function GetCurrentUser($id)
        {
            $adminPageModel = new PageModel();
            return $adminPageModel->GetUserFromDatabase($id);
        }

        function GetPageData($param, $value)
        {
            $cond = "$param = $value";

            $sql = "SELECT * FROM pages WHERE $cond";
            $adminPageModel = new PageModel();
            return $adminPageModel->GetDataFromDatabase($sql);
        }

        function CreateUsersOptionValues(array $users, $pageCreatorId, $currentUser)
        {
            $result = "";
            foreach ($users as $user) {
                $result .= "<option value='$user[id]'";

                if (isset($_GET['id'])) {
                    if ($user['id'] == $pageCreatorId) $result .= "selected";
                } else {
                    if ($user['id'] == $currentUser) $result .= "selected";
                }

                $result .= ">$user[username]</option>";
            }
            return $result;
        }

        function test_input($data)
        {
            return htmlspecialchars(stripslashes(trim($data)));
        }
    }
}