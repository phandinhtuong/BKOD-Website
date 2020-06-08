<?php
  header('Content-Type: application/json');
  include ("../models/UserModel.php");

  $_POST = json_decode(file_get_contents('php://input'), true);
  $username = $_POST["username"];
  $userModel = new UserModel();
  echo $userModel->getUserInfo($username);
?>
