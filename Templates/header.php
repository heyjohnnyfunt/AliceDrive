<header id="header" class="scene_element scene_element--fadein">

    <!-- TODO: do not forget about this -->
    <a href="/admin" class="button">Admin</a>

    <?php
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string']))
        echo '<a href="/user/account/" class="button">Hello, ' . htmlentities($_SESSION['firstname']) . '</a>';
    else{
        echo '<a class="button" id="login-dropdown-button">Log In</a>';
        include('v_login.php');
    } ?>

    <a href="/"><div id="banner"></div></a>

    <?php include('navigation.php') ?>

</header>