<?php

header('Content-Type: application/json');
include ("../models/MessageModel.php");
$userName = $_POST['userName'];
include ("../models/UserModel.php");
$userModel = new UserModel($userName);
$userId = $userModel->getUserId($userName);
$messageModel = new MessageModel($userId);
echo $messageModel->getAllMessages();

?>