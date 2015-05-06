<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php include("config/css.php"); ?>
    <?php include("config/js.php"); ?>
    <title> <?php echo /*$pageData['title']*/
            $page_title . ' | ' . $site_title; ?> </title>
</head>
<body>

<div id="wrapper">

    <?php include(D_VIEW . "header.php"); ?>

    <section >
        <h1 class="content"><?php echo $header; ?></h1>
        <?php include BASE_PATH . D_VIEW . $contentView; ?>

        <!--<h3><?php /*echo $pageData['title']*/ ?></h3>
        <p><?php /*echo $pageData['body'] */ ?></p>-->

    </section>

    <?php include(D_VIEW . "footer.php"); ?>

</div>

</body>
</html>