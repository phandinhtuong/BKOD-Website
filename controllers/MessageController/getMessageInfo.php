<?php

header('Content-Type: application/json');

include ("MessageController.php");

$messageId = $_REQUEST['messageId'];

echo $messageController->getMessageInfo($messageId);
?>