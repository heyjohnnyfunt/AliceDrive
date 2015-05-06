<div class="right-bar">

    <?php

    if (isset($message)) echo $message;
    /*if (isset($_GET['id'])) {
        $userItem = $comController->GetUser('id', $_GET['id']);
    }*/
    ?>

    <form action="index.php?page=community<?php if (isset($_GET['id'])) echo '&id=' . $userItem['id']; ?>"
          method="post" role="form" id="main-form">

        <div>
            <label for="username">Username:
                <input class="input" type="text" name="username" id="username"
                       placeholder="Username" required
                       value="<?php if (isset($_GET['id'])) echo $userItem['username']; ?>">
            </label>
        </div>

        <div>
            <label for="email">Email:
                <input class="input" type="text" name="email" id="email"
                       placeholder="Email" required
                       value="<?php if (isset($_GET['id'])) echo $userItem['email']; ?>">
            </label>
        </div>

        <div>
            <label for="firstname">First name:
                <input class="input" type="text" name="firstname" id="firstname"
                       placeholder="First name" required
                       value="<?php if (isset($_GET['id'])) echo $userItem['firstname']; ?>">
            </label>
        </div>

        <div>
            <label for="lastname">Last name:
                <input class="input" type="text" name="lastname" id="lastname"
                       placeholder="Last name" required
                       value="<?php if (isset($_GET['id'])) echo $userItem['lastname']; ?>">
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">

    </form>
</div>