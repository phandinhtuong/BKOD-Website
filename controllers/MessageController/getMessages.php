<?php

header('Content-Type: text/html; charset=UTF-8');

require_once("../../utils/auth.php");
$username = requireAuthenticated();
include ("MessageController.php");

$selectedUserId = filter_input(INPUT_GET, 'selectedUserId', FILTER_VALIDATE_INT);
if ($selectedUserId === false || $selectedUserId === null) {
    rejectRequest(400, 'Invalid user.');
}

include ("../../models/UserModel.php");

$userModel = new UserModel();
$userId = $userModel->getUserId($username);

echo $messageController->getAllMessages($userId, $selectedUserId);
?>
