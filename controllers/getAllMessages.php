<?php

header('Content-Type: application/json');
include ("../models/MessageModel.php");
$messageModel = new MessageModel();
echo $messageModel->getMessagesById();

?>