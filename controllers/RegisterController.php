<?php
session_start();
require '../utils/db_connection.php';
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);

$username = $_POST['username'];
$psw = $_POST['psw'];

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
    echo json_encode("Username already existed!");
  } else {
    echo json_encode("An unknown error occured!");
  }
} else {
  $loginInfo = array(
    'username' => $username,
    'psw' => $psw
  );
  echo json_encode($loginInfo);
}
