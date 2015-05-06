<script>
    function showConfirm(id) {
        var c = confirm("Are you sure you wish to delete this item?");
        if (c)
            window.location = "?page=news&delete=" + id;
    }
</script>

<div class="left-bar">

    <a href="?page=news" class="button">+ New topic</a>

    <ul class="left-bar-menu">
        <?php
        if ($newsTopics)
            foreach ($newsTopics as $topic) { ?>
                <li>
                    <a title="Click to edit" href="?page=news&id=<?php echo $topic['id'] ?>">
                        <h3><?php echo $topic['title'] ?></h3>
                        <i class="edit-icon"></i>
                        <p>Post date: <?php echo $topic['date'] ?></p>
                    </a>
                    <a href="#" onclick='showConfirm(<?php echo $topic['id'] ?>)'>
                        Delete
                        <i class="trash-icon"></i></a>
                </li>
            <?php }; ?>
    </ul>

</div>