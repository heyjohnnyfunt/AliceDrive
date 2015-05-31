<div id="content-reg" class="content">

    <?php if (isset($message)) echo $message; ?>

    <form method="POST">
        <input type="submit" name="LogoutButtonClick" id="LogoutButton" class="button" value="Log out">
    </form>

    <form id="regForm" name="regForm" method="POST">

        <fieldset>
            <label for="username">Username:</label>
            <input name="username" id="username" type="text" class="input"
                   value="<?php echo $username ?>">
        </fieldset>

        <fieldset>
            <label for="firstname">First name:</label>
            <input name="firstname" id="firstname" type="text" class="input" value="<?php echo $firstname ?>">
        </fieldset>

        <fieldset>
            <label for="lastname">Last name:</label>
            <input name="lastname" id="lastname" type="text" class="input" value="<?php echo $lastname ?>">
        </fieldset>

        <fieldset>
            <label for="email">E-mail address:</label>
            <input name="email" id="email" type="email" class="input" value="<?php echo $email ?>">
        </fieldset>

        <input type="submit" name="SaveChangesButtonClick" id="SaveChangesButton" class="button"
               onclick="return CheckRegForm(this.form)" value="Сохранить изменения">
    </form>

    <form id="regForm" name="regForm" method="POST">

        <fieldset>
            <label for="password">New password:</label>
            <input name="password" id="password" type="password" class="input">
        </fieldset>

        <fieldset>
            <label for="confPassword">Confirm new password:</label>
            <input name="confPassword" id="confPassword" type="password" class="input">
        </fieldset>

        <input type="submit" name="SavePasswordChangesButtonClick" id="SaveChangesButton" class="button"
               onclick="return CheckPassword(this.form)" value="Сохранить пароль">

    </form>
</div>