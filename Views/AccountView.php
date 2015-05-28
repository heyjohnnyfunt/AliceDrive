<div id="content-reg" class="content">

    <form id="regForm" name="regForm" method="POST" onsubmit="return CheckRegForm(this)">

        <fieldset>
            <label for="username">Username:</label>
            <input name="username" id="username" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="firstname">First name:</label>
            <input name="firstname" id="firstname" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="lastname">Last name:</label>
            <input name="lastname" id="lastname" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="email">E-mail address:</label>
            <input name="email" id="email" type="email" class="input">
        </fieldset>

        <fieldset>
            <label for="password">Change password:</label>
            <input name="password" id="password" type="password" class="input">
        </fieldset>

        <fieldset>
            <label for="confPassword">Confirm password:</label>
            <input name="confPassword" id="confPassword" type="password" class="input">
        </fieldset>

        <input type="submit" name="RegistrationButtonClick" id="loginButton" class="button" value="Сохранить изменения">

        <a href="/logout.php" class="button">Log out</a>
    </form>

</div>