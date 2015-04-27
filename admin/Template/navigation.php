<span class="menu-trigger">Editor Menu</span>
<div id="navigation">

    <nav class="nav">
        <ul>
            <li id="edit-span">Edit :</li>

            <?php
            $pageController = new Admin\PageController();
            $pageArray = $pageController->GetMenu();

            foreach ($pageArray as $key => $page) {
                if ($page['title'] != 'Home Page') {
                    ?>
                    <li><a href="?page=<?php echo $page['slug'] ?>">
                            <?php echo $page['title'] ?> </a></li>
                <?php }
            } ?>


            <!-- TODO: Кнопка Log Out съезжает. Расположить по центру по вертикали -->

            <li id="logout">
                <p>Hello, <?php echo $currentUser['username'] ?></p>

                <form class="formButton" method="POST" role="form" action="admin_logout.php">
                    <input type="submit" name="login" class="button" value="Log Out"/>
                </form>
            </li>

        </ul>

    </nav>

</div>
