<?php
/*$content = '<div>
    <h1>Admin Dashboard</h1>

    <p>Choose section to edit from above or below :)</p>
</div>

<div class="dashboard">

    <ul class="left-bar">';

$pageController = new AdminPageController();
$pageArray = $pageController->GetMenu();

foreach ($pageArray as $key => $page) {
    if ($page['title'] != 'Home Page') {

        $content .= '<li><a href="?page=' . $page['slug'] . '">' .
            $page['title'] . ' </a></li>';
    }
}
$content .= '</ul>

</div>';*/?>


<div>
    <h1>Admin Dashboard</h1>

    <p>Choose section to edit from above or below :)</p>
</div>

<div class="dashboard">

    <ul class="left-bar-menu">
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
    </ul>

</div>
