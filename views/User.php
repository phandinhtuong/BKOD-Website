<!DOCTYPE html>
<?php include 'static/header.html'; ?>
<style>
  <?php include('static/UserForm.css'); ?>
</style>
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
      <h1>User's Information</h1>
    </p>
  </div>

  <?php include 'NavBar.php'; ?>

  <div class="container">

    <label for="fullName"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fullName" id="fullName" required>

    <label for="school"><b>School</b></label>
    <input type="text" placeholder="Enter School" name="school" id="school">

    <label for="class"><b>Class</b></label>
    <input type="text" placeholder="Enter Class" name="class" id="class">

    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone" id="phone">

    <label for="birthday"><b>Birthday</b></label><br>
    <input type="date" id="birthday" name="birthday"><br /> <br>

    <label for="gender"><b>Gender</b></label><br />
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>
    <input type="radio" id="unrevealed" name="gender" value="unrevealed">
    <label for="unrevealed">Unrevealed</label><br><br>

  </div>
</body>
<?php include 'static/footer.html'; ?>