<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BKOD-Website</title>
        <link rel=stylesheet href="PageModel.css" type="text/css">
    </head>
    <body>

        <form action="Control.php" method="post">
            <div id="header">
                <p><h1>Log in to BKOD</h1></p>
            </div>
            <?php

            if (isset($_SESSION["w"])) {
                echo "<h2 align='center'>Wrong username or password.</h2>";
                unset($_SESSION["w"]);
                session_destroy();
            }
            else if (isset($_SESSION["u"])){
                unset($_SESSION["u"]);
                session_destroy();
            }
            else if (isset($_SESSION["registerSuccess"])){
                echo "<h2 align='center'>Registered successfully!</h2>";
                unset($_SESSION["registerSuccess"]);
                session_destroy();
            }
            ?>
            <div id="main">
                <input type="hidden" value="login" name="message">
                <input type="text" name="username" value="a@a.a"><br>
                <input type="text" name="password" value="a"><br>
                <input type="submit" value="Log in">
                <br />
                <div style="font-size: 14px">Does not have an account? Click <a href="Register.php" >here</a> to register.</div>
            </div>
        </form>


    </body>
</html>
