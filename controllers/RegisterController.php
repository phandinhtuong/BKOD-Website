<?php
session_start();
require '../utils/db_connection.php';
header('Content-type:application/json');
$_POST = json_decode(file_get_contents('php://input'), true);

$username = $_POST['username'];
$psw = $_POST['psw'];

$fullName = $_POST['fullName'];
$hash256Password = $psw . $username . "BKODv1Habvietio";
$hash256Password = hash("sha256", $hash256Password);


$userId = time();
$insertUserQuery = $db->prepare("INSERT INTO user (userId, username, password, fullname) VALUES (?, ?, ?, ?)");
$insertUserQuery->bind_param("ssss", $userId, $username, $hash256Password, $fullName);

if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$res = $insertUserQuery->execute();

if( $res !== false ) {
  // query ok
  $loginInfo = array(
    'username' => $username,
    'psw' => $psw
  );
  echo json_encode($loginInfo);
} else {
  echo json_encode("Username already existed!");
}

?>