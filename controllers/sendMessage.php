<?php

header('Content-Type: application/json');
include ("../models/MessageModel.php");

$receiverId = $_REQUEST['receiverId'];
$message = $_REQUEST['message'];
$username = $_REQUEST['username'];

include ("../models/UserModel.php");
$userModel = new UserModel();
$senderId = $userModel->getUserId($username);

//echo $userId;

$messageModel = new MessageModel();
$messageModel->sendMessage($senderId, $receiverId, $message);

?>