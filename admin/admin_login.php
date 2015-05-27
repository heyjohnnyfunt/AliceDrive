<?php include("config/admin_setup.php");

session_start();

if(isset($_SESSION['username'])){
    header("Location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminPageController = new Admin\PageController();
    if(!$adminPageController->SetAdminUser($_POST['username'],$_POST['password']))
        $message = 'Invalid data passed';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php include("config/admin_css.php"); ?>
    <?php include("config/admin_js.php"); ?>
    <title> <?php echo $page_title . ' | ' . $site_title; ?> </title>
</head>
<body>

<div id="wrapper">

    <section id="content" class="content">
        <h1>LOGIN</h1>

        <form method="POST" id="loginForm" name="login_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" role="form">

            <!-- USERNAME -->
            <p>
                <label for="user_login">Username<br/>
                    <input type="text" name="username"
                           class="input" placeholder="Enter username" size="30"/>
                </label>
            </p>

            <!-- PASSWORD -->
            <p>
                <label for="password">Password<br/>
                    <input type="password" name="password"
                           class="input" placeholder="Enter password" size="30"/>
                </label>
            </p>

            <?php if (!empty($message)) {
                echo "<p class=\"error\">" . $message . "</p>";
            } ?>

            <!-- LOGIN BUTTON-->

            <p>
                <input type="submit" name="login" class="button" value="Log In"/>
            </p>

        </form>

    </section>

</div>

</body>
</html>