<?php
require 'db_connection.php';

$username = $_POST['username'];
$psw = $_POST['psw'];
$repeat_psw = $_POST['psw-repeat'];
$hash256Password = $psw . $username . "BKODv1Habvietio";
$hash256Password = hash("sha256", $hash256Password);
echo $hash256Password . "/n";

echo $username;
echo $psw;
echo $repeat_psw;

echo $db;
$insertUserQuery = $db->prepare("INSERT INTO user (UserId, username, password, fullname) VALUES (123, ?, ?, 'Nguyễn Văn Nam')");
if (PEAR::isError($insertUserQuery)) {
  echo "Bad query detected!";
}
$data = array($username, $hash256Password);

$res = & $db->execute($insertUserQuery, $data);

if (PEAR::isError($res)) {
  die($res->getDebugInfo());
}

?>
