<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 28.05.2015
 * Time: 15:11
 */
# Start session:
session_start();

unset($_SESSION['username']);

# This would delete all of the session keys
// session_destroy();

# Redirect to login page
header('Location: /user');