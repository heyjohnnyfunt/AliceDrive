<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php include("config/css.php"); ?>
    <?php include("config/js.php"); ?>
    <title> <?php echo $page_title . ' | ' . $site_title; ?> </title>
</head>
<body>

<div class="m-scene" id="wrapper">

    <?php include("header.php"); ?>

    <section id="section" class="scene_element scene_element--fadeinup">

        <?php if($page_title != 'Home'){?>
        <h1 class="content"><?php echo $header; ?></h1>
        <?php } ?>
        <?php include BASE_PATH . D_VIEW . $contentView; ?>

    </section>

    <?php include("footer.php"); ?>

</div>

</body>
</html>