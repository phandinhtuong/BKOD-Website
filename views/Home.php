<!DOCTYPE html>
<?php include 'static/header.html'; ?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION["u"])) {
    header('Location: index.php');
    session_destroy();
}
?>

<body>
    <div id="header">
        <p>
            <h1>Home Page</h1>
        </p>
    </div>

    <?php include 'NavBar.php'; ?>

    <div id="main">
        <h1 align="center">Welcome to BKOD Website</h1>


    </div>
</body>
<?php include 'static/footer.html'; ?>