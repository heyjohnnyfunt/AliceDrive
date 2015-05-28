<?php defined('ACCESS_ALLOWED') or die('Restricted Access'); ?>
<script>
    function showConfirm(id) {
        var c = confirm("Are you sure you wish to delete this item?");
        if (c)
            window.location = "?page=community&delete=" + id;
    }
</script>

<div class="left-bar">

    <a href="?page=community" class="button">+ New user</a>

    <ul class="left-bar-menu">
    <?php
    if ($userArray)
        foreach ($userArray as $userAcc) { ?>
            <li>
                <a href="?page=community&id=<?php echo $userAcc['id'] ?>">
                    <h3>Username: <?php echo $userAcc['username'] ?></h3>
                    <i class="edit-icon"></i>
                    <p>Email: <?php echo $userAcc['email'] ?></p>
                </a>
                <a href="#" onclick='showConfirm(<?php echo $userAcc['id'] ?>)'>Delete
                    <i class="trash-icon"></i></a>
            </li>
        <?php }; ?>
    </ul>
</div>
