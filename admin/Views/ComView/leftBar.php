<div class="left-bar">
    <?php
    if (isset($_POST['SaveButtonClick'])) {
        $comController = new Admin\CommunityController();
        if(isset($_GET['id']))
            $message = $comController->InsertUser($_GET['id']);
        else
            $message = $comController->InsertUser();
    }
    ?>

    <a href="?page=community" class="button">+ New user</a>

    <ul class="left-bar-menu">
        <?php
        if ($userArray)
            foreach ($userArray as $userAcc) { ?>
                <li><a href="?page=community&id=<?php echo $userAcc['id'] ?>">
                        <i class="edit-icon"></i>
                        <p>Username: <?php echo $userAcc['username'] ?></p>
                        <p>Email: <?php echo $userAcc['email'] ?></p>
                    </a></li>
            <?php }; ?>
    </ul>
</div>
