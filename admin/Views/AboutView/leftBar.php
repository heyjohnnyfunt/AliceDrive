<?php defined('ACCESS_ALLOWED') or die('Restricted Access'); ?>
<script>
    function showConfirm(id) {
        var c = confirm("Are you sure you wish to delete this item?");
        if (c)
            window.location = "?page=about&delete=" + id;
    }
</script>

<div class="left-bar">

    <a href="?page=about" class="button">+ New member</a>

    <ul class="left-bar-menu">
    <?php
    if ($memberList)
        foreach ($memberList as $groupMember) { ?>
            <li>
                <a href="?page=about&id=<?php echo $groupMember['id'] ?>">
                    <h3><?php echo $groupMember['name'] ?></h3>
                    <i class="edit-icon"></i>
                    <p><?php echo $groupMember['instrument'] ?></p>
                </a>
                <a href="#" onclick='showConfirm(<?php echo $groupMember['id'] ?>)'>Delete
                    <i class="trash-icon"></i></a>
            </li>
        <?php }; ?>
    </ul>
</div>
