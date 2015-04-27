<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 26.04.2015
 * Time: 1:17
 */

?>

<div>
    <h1>Admin Dashboard</h1>
    <p>Choose section to edit from above or below :)</p>
</div>

<div class="dashboard">

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