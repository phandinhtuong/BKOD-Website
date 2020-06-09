<?php
  include ("UserController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $userController->deleteUser($username);
  }
?>