<?php
namespace MainWebSite {

// Debugging tool
    error_reporting(E_ALL);

# Constants:
// Root project path
    DEFINE('BASE_PATH', dirname(realpath(__DIR__)) . '/');
    DEFINE('DS', DIRECTORY_SEPARATOR);
    DEFINE('D_MODEL', 'Models/');
    DEFINE('D_VIEW', 'Views/');
    DEFINE('D_CONTROLLER', 'Controllers/');

    $site_title = 'Alice Drive Official';
    $page_title = 'Home Page';

# Include required file
    require(BASE_PATH . 'Controllers/PageController.php');
    require(BASE_PATH . 'Controllers/functions.php');

# Page Controllers object

    $pageController = new PageController();

    /*$path = parse_path();
    $pageData = $pageController->GetPageData($path['call_parts'][0]);*/
}
