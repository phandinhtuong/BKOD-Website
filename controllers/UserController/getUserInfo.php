<?php
  include ("UserController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $userController->validateInput($username);
    $userController->getUserInfo($username);
  } else
    $userController->respondMissingFields("username");
?>