<?php

header('Content-Type: application/json');

include ("MessageController.php");

$receiverId = $_REQUEST['receiverId'];
$message = $_REQUEST['message'];
$username = $_REQUEST['username'];

include ("../../models/UserModel.php");
$userModel = new UserModel();
$senderId = $userModel->getUserId($username);

//echo $userId;
$messageController->sendMessage($senderId, $receiverId, $message);

?>