<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];

$deleteUserQuery = $db->prepare("DELETE FROM user WHERE username=?");

$deleteUserQuery->bind_param("s", $username);

$success = $deleteUserQuery->execute();

if( $success !== false ) {
  echo json_encode("Deleted successfully!");
} else {
  echo json_encode("An unknown error occured!");
}

?>
