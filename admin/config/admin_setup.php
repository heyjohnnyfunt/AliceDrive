<?php

namespace Admin {

// Debugging tool
    error_reporting(E_ALL);

# Constants:
// Root project path
    DEFINE('ADMIN_PATH', dirname(realpath(__DIR__)) . '/');
    DEFINE('IMAGES', dirname(dirname(__DIR__)) . "/Images/");
    DEFINE('DS', DIRECTORY_SEPARATOR);
    DEFINE('ADMIN_MODEL', 'Model/');
    DEFINE('ADMIN_VIEW', 'Views/');
    DEFINE('ADMIN_CONTROLLER', 'Controller/');
    DEFINE('ADMIN_TEMPLATE', 'Template/');

    $site_title = 'Alice Drive CMS';
    $page_title = 'Admin';

    require(ADMIN_PATH . 'Controller/PageController.php');
}
