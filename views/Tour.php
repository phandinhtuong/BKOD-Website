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
        <link rel=stylesheet href="static/PageModel.css" type="text/css">
    </head>
    <body>
        <div id="header">
            <p><h1>Tours list</h1></p>
    </div>

    <?php include 'NavBar.php'; ?>

    <div id="main">



    </div>
</body>
</html>
