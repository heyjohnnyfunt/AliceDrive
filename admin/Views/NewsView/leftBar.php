<script>
    //Display a confirmation box when trying to delete an object
    function showConfirm(id)
    {
        // build the confirmation box
        var c = confirm("Are you sure you wish to delete this item?");

        // if true, delete item and refresh
        if(c)
            window.location = "&delete=" + id;
    }
</script>

<div class="left-bar">
    <?php
    // This code will save input from FORM in rightBar.php
    // if SaveButtonClick was clicked (also from rightBar.php)
    if (isset($_POST['SaveButtonClick'])) {
        $newsController = new Admin\NewsController();
        if(isset($_GET['id']))
            $message = $newsController->InsertNews($_GET['id']);
        else
            $message = $newsController->InsertNews();
    }
    ?>

    <a href="?page=news" class="button">+ New topic</a>

    <ul class="left-bar-menu">

    <?php
    /*$newsController = new Admin\NewsController();
    $newsTopics = $newsController->GetTopics();*/

    if ($newsTopics)    /*count($newsTopics) > 0*/
        foreach ($newsTopics as $topic) { ?>
            <li>
                <a title="Click to edit" href="?page=news&id=<?php echo $topic['id'] ?>">
                    <h3><?php echo $topic['title'] ?></h3>
                    <i class="edit-icon"></i>
                    <p>Post date: <?php echo $topic['post_date'] ?></p>
                </a>
                <a href="?delete=<?php echo $topic['id'] ?>" type="submit"
                   onclick='showConfirm(<?php echo $topic['id'] ?>)'>Delete
                    <i class="trash-icon" ></i></a>
            </li>
        <?php }; ?>
    </ul>

</div>