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

    <?php include(ADMIN_TEMPLATE . "header.php"); ?>

    <section id="content">

        <div>
            <h1 class="content"><?php echo $header; ?></h1>
        </div>

        <?php include(ADMIN_PATH . ADMIN_VIEW . $contentView);?>

    </section>

    <?php include(ADMIN_TEMPLATE . "footer.php"); ?>

</div>

</body>
</html>