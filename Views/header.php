<header id="header" class="scene_element scene_element--fadein">

    <!-- TODO: do not forget about this -->
    <a href="/admin" class="button">Admin</a>

    <?php
    if (isset($_SESSION['username']))
        echo '<a href="/user/account/" class="button">Hello ' . $_SESSION['username'] . '</a>';
    else{
        echo '<a class="button" id="login-dropdown-button">Log In</a>';
        include('v_login.php');
    } ?>

    <a href="/"><div id="banner"></div></a>

    <?php include('navigation.php') ?>

</header>