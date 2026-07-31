<?php
  require_once("../../utils/auth.php");
  requireAdmin();
  include ("UserController.php");
  $userController->getAllUsers();
?>
