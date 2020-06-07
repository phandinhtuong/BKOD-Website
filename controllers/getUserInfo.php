<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];

$getUsersInfoQuery = $db->prepare("SELECT * FROM user where username = ?");
if (PEAR::isError($getUsersInfoQuery)) {
  echo "Bad query detected!";
}

$res = &$db->execute($getUsersInfoQuery, $username);

if (PEAR::isError($res)) {
  $err = $res->getDebugInfo();
  echo json_encode("An unknown error occured!");
} else {
  $user = $res->fetchRow();
  echo json_encode($user);
}
