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

$updateUserInfoQuery = $db->prepare("UPDATE user
  SET fullName=?, school=?, class=?, phoneNumber=?, birthday=?, gender=?
  WHERE username=? ");

if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$updateUserInfoQuery->bind_param("sssssss", $fullName, $school, $class, $phone, $birthday, $gender, $username);

$success = $updateUserInfoQuery->execute();

if( $success !== false ) {
  echo json_encode("Updated successfully!");
} else {
  echo json_encode("An unknown error occured!");
}

?>
