<?php
session_start();
require 'db_connection.php';

$username = $_POST['username'];
$psw = $_POST['psw'];
$repeat_psw = $_POST['psw-repeat'];

if ($psw != $repeat_psw) {
  $_SESSION["mismatchPsw"] = "mismatchPsw";
  header('Location: Register.php');
  exit();
}

$fullName = $_POST['fullName'];
$hash256Password = $psw . $username . "BKODv1Habvietio";
$hash256Password = hash("sha256", $hash256Password);

$userId = time();
$insertUserQuery = $db->prepare("INSERT INTO user (UserId, username, password, fullname) VALUES (?, ?, ?, ?)");
if (PEAR::isError($insertUserQuery)) {
  echo "Bad query detected!";
}
$data = array($userId, $username, $hash256Password, $fullName);

$res = &$db->execute($insertUserQuery, $data);

if (PEAR::isError($res)) {
  $err = $res->getDebugInfo();
  if (strpos($err, 'Duplicate entry') !== false) {
    $_SESSION["duplicateEntry"] = "duplicateEntry";
    header('Location: Register.php');
    exit();
  } else {
    $_SESSION["unknownError"] = "unknownError";
    header('Location: Register.php');
    exit();
  }
} else {
  $loginInfo = array(
    'username' => $username,
    'psw' => $psw
  );
  $_SESSION["registerSuccess"] = $loginInfo;
  header('Location: index.php');
  exit();
}
