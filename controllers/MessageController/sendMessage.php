<?php

header('Content-Type: application/json');

require_once("../../utils/auth.php");
$username = requireAuthenticatedMutation();
include ("MessageController.php");

$receiverId = $_POST['receiverId'];
$message = $_POST['message'];

include ("../../models/UserModel.php");
$userModel = new UserModel();
$senderId = $userModel->getUserId($username);

//echo $userId;
$messageController->sendMessage($senderId, $receiverId, $message);

?>
