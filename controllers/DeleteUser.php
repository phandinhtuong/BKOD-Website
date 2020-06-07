<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];

require '../utils/db_connection.php';

$deleteUserQuery = $db->prepare("DELETE FROM user WHERE username=?;");

if (PEAR::isError($deleteUserQuery)) {
  echo "Bad query detected!";
}

$data = $username;

$res = &$db->execute($deleteUserQuery, $username);

if (PEAR::isError($res)) {
  $err = $res->getDebugInfo();
  echo json_encode($err);
} else {
  echo json_encode("Deleted successfully!");
}

?>
