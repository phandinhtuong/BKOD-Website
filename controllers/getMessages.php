<?php

header('Content-Type: application/json');
include ("../models/MessageModel.php");
$username = $_REQUEST['username'];
include ("../models/UserModel.php");
$userModel = new UserModel();
$userId = $userModel->getUserId($username);

$messageModel = new MessageModel();

echo $messageModel->getAllMessages($userId);

?>