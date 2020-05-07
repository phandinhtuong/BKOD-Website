<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION["u"])){
    header('Location: index.php');
    session_destroy();
}
?>
<html>
    <head>
        <title>BKOD-Website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel=stylesheet href="PageModel.css" type="text/css">
    </head>
    <body>
        <div id="header">
            <p><h1>Tours list</h1></p>
    </div>

    <ul id="navbar">
        <!--Tours-->
        <li><a href="Home.php">Tours</a></li>
        <!--News-->
        <li><a href="News.html">News</a></li>
        <!--Message-->
        <li><a href="Message.html">Message</a></li>
        <!--Support-->
        <li><a href="Support.html">Support</a></li>
        <!--private info-->
        <li><a href="User.html"><?php echo $_SESSION["u"]; ?></a></li>        
        
        <!--Log out-->
        <li><a href="index.php">Log out</a></li>
    </ul>

    <div id="main">



    </div>
</body>
</html>
