<?php
  include ("UserController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['username'], $_POST["psw"], $_POST["fullName"])) {
    $username = $_POST['username'];
    $fullName = $_POST["fullName"];
    $psw = $_POST['psw'];
    $userController->validateInput($username, $fullName, $psw);
    $userController->registerUser($username, $fullName, $psw);
  } else
    $userController->respondMissingFields("username", "fullName", "psw");
?>