<?php
  header('Content-Type: application/json');
  include ("../models/UserModel.php");

  $_POST = json_decode(file_get_contents('php://input'), true);
  $username = $_POST['username'];
  $fullName = $_POST["fullName"];
  $school = $_POST["school"];
  $class = $_POST["classVar"];
  $phone = $_POST["phone"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];

  $userModel = new UserModel();
  echo $userModel->updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username);

?>
