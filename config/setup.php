<?php
namespace MainWebSite {

    defined('INDEX_ACCESS_ALLOWED') or die('Restricted Access');

// Debugging tool
    error_reporting(E_ALL);

# Constants:
// Root project path
    DEFINE('BASE_PATH', dirname(realpath(__DIR__)) . '/');
    DEFINE('DS', DIRECTORY_SEPARATOR);
    DEFINE('D_MODEL', 'Models/');
    DEFINE('D_VIEW', 'Views/');
    DEFINE('D_TEMPLATE', 'Templates/');
    DEFINE('D_CONTROLLER', 'Controllers/');

    DEFINE("SECURE", FALSE);    // FOR DEVELOPMENT ONLY

# Include required file
    require(BASE_PATH . 'Controllers/PageController.php');
    require(BASE_PATH . 'Controllers/functions.php');

}
