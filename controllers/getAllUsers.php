<?php
  header('Content-Type: application/json');
  include ("../models/UserModel.php");

  $userModel = new UserModel();
  echo $userModel->getAllUsers();
?>
