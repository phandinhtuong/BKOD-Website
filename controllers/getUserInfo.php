<?php
require '../utils/db_connection.php';
header('Content-type:application/json');

$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];

$getUsersInfoQuery = $db->prepare("SELECT * FROM user where username = ?");
$getUsersInfoQuery->bind_param("s", $username);

$success = $getUsersInfoQuery->execute();

if( $success !== false ) {
  $res = $getUsersInfoQuery->get_result();

  $user = $res->fetch_row();
  echo json_encode($user);
} else {
  echo json_encode("An unknown error occured!");
}
