<script>
    function showConfirm(id) {
        var c = confirm("Are you sure you wish to delete this item?");
        if (c)
            window.location = "?page=music&delete=" + id;
    }
</script>

<div class="left-bar">

    <a href="?page=music" class="button">+ New song</a>

    <ul class="left-bar-menu">
    <?php
    if ($musicList)
        foreach ($musicList as $music) { ?>
            <li>
                <a href="?page=music&id=<?php echo $music['id'] ?>">
                    <h3><?php echo $music['name'] ?></h3>
                    <i class="edit-icon"></i>
                </a>
                <a href="#" onclick='showConfirm(<?php echo $music['id'] ?>)'>Delete
                    <i class="trash-icon"></i></a>
            </li>
        <?php }; ?>
    </ul>
</div>
