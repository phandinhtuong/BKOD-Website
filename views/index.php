<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$username = null;
$password = null;
$registerSuccess = false;
if (isset($_SESSION["registerSuccess"])) {
    $username = $_SESSION["registerSuccess"]["username"];
    $password = $_SESSION["registerSuccess"]["psw"];
    $registerSuccess = true;
} else {
    $username = "a@a.a";
    $password = "a";
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>BKOD-Website</title>
    <link rel=stylesheet href="static/PageModel.css" type="text/css">
</head>

<body>

    <form action="../controllers/Control.php" method="post">
        <div id="header">
            <p>
                <h1>Log in to BKOD</h1>
            </p>
        </div>
        <?php

        if (isset($_SESSION["w"])) {
            echo "<h2 align='center'>Wrong username or password.</h2>";
            unset($_SESSION["w"]);
            session_destroy();
        } else if (isset($_SESSION["u"])) {
            unset($_SESSION["u"]);
            session_destroy();
        } else if ($registerSuccess) {
            echo "<h2 align='center'>Registered successfully!</h2>";
            unset($_SESSION["registerSuccess"]);
            session_destroy();
        }
        ?>
        <h2 align='center' id="regSuccess" style="display: none">Registered successfully!</h2>
        <div id="main">
            <input type="hidden" value="login" name="message">
            <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>
            <input type="password" name="password" id="psw" value="<?php echo $password ?>"><br>
            <input type="submit" value="Log in">
            <br />
            <div style="font-size: 14px">Does not have an account? Click <a href="Register.html">here</a> to register.</div>
        </div>
    </form>


</body>

</html>

<script>
    window.onload = () => {
        if (localStorage.getItem('regSuccess')) {
            let retrievedUser = localStorage.getItem('user');
            if (retrievedUser) {
                let user = JSON.parse(retrievedUser)
                document.getElementById("username").value = user.username;
                document.getElementById("psw").value = user.psw;
                document.getElementById("regSuccess").style.display = "block";
            }
            localStorage.removeItem("regSuccess");
        }
        localStorage.removeItem("currentUser");
    }
</script>