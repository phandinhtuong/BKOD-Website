<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

            <div id="main">
                <input type="hidden" value="login" name="message">
                <input type="text" name="username" value="a@a.a"><br>
                <input type="text" name="password" value="a"><br>
                <input type="submit" value="Log in">

            </div>
        </form>

    </body>
</html>
