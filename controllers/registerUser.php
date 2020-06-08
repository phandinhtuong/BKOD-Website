<?php
  header('Content-Type: application/json');
  include ("../models/UserModel.php");

  $_POST = json_decode(file_get_contents('php://input'), true);
  $username = $_POST['username'];
  $psw = $_POST['psw'];
  $fullName = $_POST['fullName'];

  $userModel = new UserModel();
  echo $userModel->registerUser($username, $psw, $fullName);
?>
