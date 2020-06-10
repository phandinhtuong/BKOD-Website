<?php

header('Content-Type: application/json');

include ("MessageController.php");

$username = $_REQUEST['username'];
$selectedUserId = $_REQUEST['selectedUserId'];

include ("../../models/UserModel.php");

$userModel = new UserModel();
$userId = $userModel->getUserId($username);

echo $messageController->getAllMessages($userId, $selectedUserId);
?>