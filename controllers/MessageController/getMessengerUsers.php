<?php

require_once("../../utils/auth.php");
requireAuthenticated();
include ("MessageController.php");

echo $messageController->getMessengerUsers();

