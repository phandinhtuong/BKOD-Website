<?php
if (!isset($_SESSION))
  session_start();
$fullName;
$school;
$class;
$phone;
$birthday;
$gender;
$username = $_SESSION["u"];

if (isset($_POST["fullName"])) {
  $fullName = $_POST["fullName"];
  $school = $_POST["school"];
  $class = $_POST["class"];
  $phone = $_POST["phone"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];
  updateUserInfo();
}

function updateUserInfo()
{
  require '../utils/db_connection.php';
  global $fullName, $school, $class, $phone, $birthday, $gender, $username;

  $updateUserInfoQuery = $db->prepare("UPDATE user
  SET fullName=?, school=?, class=?, phoneNumber=?, birthday=?, gender=?
  WHERE username=? ");

  if (PEAR::isError($updateUserInfoQuery)) {
    echo "Bad query detected!";
  }

  $data = array($fullName, $school, $class, $phone, $birthday, $gender, $username);

  $res = &$db->execute($updateUserInfoQuery, $data);

  if (PEAR::isError($res)) {
    $err = $res->getDebugInfo();
    $_SESSION["unknownError"] = "unknownError";
  } else {
    $_SESSION["updateUserInfoSuccess"] = $username;
  }
  header('Location: ../views/User.php');
  exit();
}

function getUsersInfo()
{
  require '../utils/db_connection.php';

  global $username;

  $getUsersInfoQuery = $db->prepare("SELECT * FROM user where username = ?");
  if (PEAR::isError($getUsersInfoQuery)) {
    echo "Bad query detected!";
  }

  $res = &$db->execute($getUsersInfoQuery, $username);

  if (PEAR::isError($res)) {
    $err = $res->getDebugInfo();
    echo $err;
  } else {
    $user = $res->fetchRow();
    return $user;
  }
}
