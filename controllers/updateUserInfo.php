<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];
$fullName = $_POST["fullName"];
$school = $_POST["school"];
$class = $_POST["classVar"];
$phone = $_POST["phone"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];

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
  echo json_encode("An unknown error occured!");
} else {
  echo json_encode("Updated successfully!");
}

?>
