<?php

header('Content-Type: application/json');

require_once("../../utils/auth.php");
$username = requireAuthenticated();
include ("MessageController.php");

$messageId = $_GET['messageId'];

include ("../../models/UserModel.php");
$userModel = new UserModel();
$currentUserId = $userModel->getUserId($username);
echo $messageController->getMessageInfo($messageId, $currentUserId);
?>
