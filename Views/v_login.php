<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 22.03.2015
 * Time: 21:56
 */

?>

<div id="login">
    <!-- <h1><?php /*echo $this->getData('name')*/ ?></h1>-->
    <form method="POST">
        <!--<div class="button"><a href="../Login/login.php">Login</a></div>-->

        <input type="submit" name="login" class="button" value="Log In"/>

        <!-- TODO: do not forget about this -->
        <a href="/admin" class="button">Admin</a>
        <!-- <div class="loginForm">
             <form method="POST">
                 <p> Username:
                     <input name="user" type="text">
                 </p>
                 <p> Password:
                     <input name="pass" type="password">
                 </p>
                 <input type="submit" name="op" value="Login">
             </form>
         </div>-->

    </form>


</div>