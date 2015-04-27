<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 23.03.2015
 * Time: 23:10
 */
namespace MainWebSite {
    include(BASE_PATH . 'Models/PageModel.php');

    class PageController
    {
        function GetPageData($path)
        {
            // Creating Models object
            $pageModel = new PageModel();
            return $pageModel->GetPageDataFromDatabase($this->GetPageId($path));
        }

        function GetMenu()
        {
            $pageModel = new PageModel();
            return $pageModel->GetMenuFromDatabase();
        }

        function GetDebugValue()
        {
            $pageModel = new PageModel();
            return $pageModel->GetSettingValue('debug-setting');
        }

        function GetPageId($pathToCheck)
        {
            /*if (isset($_GET['page'])) {
                $pageId = $_GET['page'];    // Set $pageId to equal value given in URL
            } else {
                $pageId = 'home';           // Set $pageId equal to 1 (Home Page)
            }*/
            if (!isset($pathToCheck) || $pathToCheck == '') {
//            $pathToCheck = 'home';
                header('Location: home');
            }
            return $pathToCheck;
        }
    }
}