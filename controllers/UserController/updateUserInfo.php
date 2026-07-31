<?php
  require_once("../../utils/auth.php");
  $authenticatedUsername = requireAuthenticatedMutation();
  include ("UserController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['username'], $_POST["fullName"], $_POST["school"], $_POST["classVar"], $_POST["phone"], $_POST["birthday"], $_POST["gender"])) {
    $username = $authenticatedUsername;
    $fullName = $_POST["fullName"];
    $school = $_POST["school"];
    $class = $_POST["classVar"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $userController->validateInput($fullName, $school, $class, $phone, $birthday, $gender, $username);
    $userController->updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username);
  } else
    $userController->respondMissingFields("fullName", "school", "class", "phone", "birthday", "username");
?>
