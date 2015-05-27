<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 22.03.2015
 * Time: 21:56
 */

?>

<div id="login">

    <input type="submit" name="login" class="button" id="login-dropdown-button" value="Log In"/>

    <!-- TODO: do not forget about this -->
    <a href="/admin" class="button">Admin</a>

    <div id="content-login" class="content">

        <a href="#" class="slidelink" id="showregister">Don't Have An Account? &rarr;</a>

        <form id="loginForm" name="loginForm" method="POST">

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



</div>