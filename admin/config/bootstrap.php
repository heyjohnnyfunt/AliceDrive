<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 10.04.2015
 * Time: 22:48
 */
namespace Admin {
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: admin_login.php");
    } /*else {
        $controller = new PageController();
        $currentUser = $controller->GetCurrentUser($_SESSION['username']);
    }*/

    require_once ADMIN_PATH . 'Core/BaseModel.php';
    require_once ADMIN_PATH . 'Core/BaseController.php';
    require_once ADMIN_PATH . 'Core/BaseView.php';

    require_once ADMIN_PATH . 'Core/Route.php';

    new Route($_SESSION['username']);
}