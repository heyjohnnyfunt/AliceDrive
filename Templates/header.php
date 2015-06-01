<header id="header" class="scene_element scene_element--fadein">

    <div class="home-button">
        <?php
        if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string']))
            echo '<a href="/user/account/" class="button">Hello, ' . htmlentities($_SESSION['firstname']) . '</a>';
        else {
            echo '<a class="button" id="login-dropdown-button">Log In</a>';
            include('v_login.php');
        } ?>

    </div>
    <div id="search">
        <!--<form method="post">
            <label for="searchInput"></label>
            <input type="text" id="searchInput" name="searchInput" class="searchInput">
            <input type="submit" name="SearchButtonClick" class="search-icon" value="">
        </form>-->
        <a href="/search">
            <div class="search-icon"></div>
        </a>
    </div>

    <a href="/">
        <div id="banner"></div>
    </a>

    <?php include('navigation.php') ?>

</header>