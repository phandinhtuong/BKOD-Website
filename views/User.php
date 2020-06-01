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
            <h1>Users Information</h1>
        </p>
    </div>

    <?php include 'NavBar.php'; ?>

    <div id="user-info">

    <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>

      <label for="fullName"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="fullName" id="fullName" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

    </div>
</body>
<?php include 'static/footer.html'; ?>