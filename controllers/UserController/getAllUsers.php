<?php
  include ("UserController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  $userController->getAllUsers();
?>