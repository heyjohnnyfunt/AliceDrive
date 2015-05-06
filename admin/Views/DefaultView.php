<div class="dashboard">
    <p>Choose section to edit from above or below :)</p>

    <ul class="left-bar-menu">
        <?php

        foreach ($menuArray as $key => $menuItem) {
            if ($menuItem['title'] != 'Home Page') {
                ?>
                <li><a href="?page=<?php echo $menuItem['slug'] ?>">
                        <?php echo $menuItem['title'] ?> </a></li>
            <?php }
        } ?>
    </ul>

</div>