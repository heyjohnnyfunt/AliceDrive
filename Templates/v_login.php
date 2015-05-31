<div id="login">

    <div id="content-login" class="content">

        <?php if(isset($message)) echo $message; ?>
        <a href="/user">Don't Have An Account? &rarr;</a>

        <form id="loginForm" class="loginForm" name="loginForm" method="POST">

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
                <input type="submit" name="LoginButtonClick" id="loginButton" class="button" value="Login"
                       onclick="return formhash(this.form)">
            </fieldset>

        </form>
    </div>


</div>