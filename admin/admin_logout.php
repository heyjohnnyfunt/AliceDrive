<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 25.03.2015
 * Time: 2:01
 */

# Start session:
session_start();

unset($_SESSION['username']);

# This would delete all of the session keys
// session_destroy();

# Redirect to login page
header('Location: admin_login.php');