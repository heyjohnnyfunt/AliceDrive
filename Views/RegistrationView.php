<div id="content-login-page" class="content">

    <a href="#" id="showReg">Don't Have An Account? &rarr;</a>

    <form id="loginFormPage" class="loginForm" name="loginForm" method="POST">

        <fieldset>
            <label for="username"> Username: </label>
            <input name="username" id="username" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="password"> Password:</label>
            <input name="password" id="password" type="password" class="input">
        </fieldset>

        <fieldset>
            <label for="checkbox"><input type="checkbox" id="checkbox"/>Remember me</label>
            <input type="submit" name="op" id="loginButton" class="button" value="Login">
        </fieldset>
    </form>
</div>

<div id="content-reg" class="content">

    <a href="#" id="showLogin">&larr; Already have an account?</a>

    <form id="regForm" name="regForm" method="POST">

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
            <input name="email" id="email" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="password">Password:</label>
            <input name="password" id="password" type="text" class="input">
        </fieldset>

        <fieldset>
            <label for="confPassword">Confirm password:</label>
            <input name="confPassword" id="confPassword" type="text" class="input">
        </fieldset>
    </form>

</div>