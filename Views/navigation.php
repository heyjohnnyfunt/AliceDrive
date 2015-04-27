<span class="menu-trigger">Menu</span>
<div id="navigation">
    <nav class="nav">
        <ul>
            <?php
            $pageController = new MainWebSite\PageController();
            $pageArray = $pageController->GetMenu();

            foreach ($pageArray as $key => $page) {

                if ($page['title'] != 'Home Page')
                    echo '<li><a href="/' . $page['slug'] . '">'
                        . $page['title'] . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
