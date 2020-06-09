<?php

header('Content-Type: application/json');
include ("../models/MessageModel.php");
$receiverId = $_POST['receiverId'];
$message = $_POST['message'];

$messageModel = new MessageModel();
$messageModel->sendMessage($receiverId, $message);

?>