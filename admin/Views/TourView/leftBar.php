<script>
    function showConfirm(id)
    {
        var c = confirm("Are you sure you wish to delete this item?");

        if(c)
            window.location = "?page=tour&delete=" + id;
    }
</script>

<div class="left-bar">

    <a href="?page=tour" class="button">+ New concert</a>

    <ul class="left-bar-menu">

    <?php

    if ($tourTopics)    /*count($newsTopics) > 0*/
        foreach ($tourTopics as $topic) { ?>
            <li>
                <a title="Click to edit" href="?page=tour&id=<?php echo $topic['id'] ?>">
                    <h3><?php echo $topic['place'] ?></h3>
                    <i class="edit-icon"></i>
                    <p>Date: <?php echo $topic['date'] ?></p>
                </a>
                <a id="del_<?php echo $topic['id'] ?>" href="#" onclick='showConfirm(<?php echo $topic['id'] ?>)'>Delete
                    <i class="trash-icon" ></i></a>
            </li>
        <?php }; ?>
    </ul>

</div>