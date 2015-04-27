<?php
namespace Admin {
    include("config/admin_setup.php");
    include("config/bootstrap.php");

// TODO: Correct disallowed paths, as below code does not provide
// TODO: security when I call, i.e.: alicedrive/admin/view/MusicView.php

// Set the default content
    /*$pageBody = 'index_section';
    $disallowed_paths = array('header', 'footer');

    if (!empty($_GET['page'])) {
        $tmp = basename($_GET['page']);
        if (!in_array($tmp, $disallowed_paths) && file_exists("Views/{$tmp}.php"))
            $pageBody = $tmp;
    }*/

    /*require('Views/PageView.php');*/

//    require('Template.php');
}