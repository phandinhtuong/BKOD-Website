<?php
  include ("NewsController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['newsId'])) {
    $newsId = $_POST['newsId'];
    $newsController->validateInput($newsId);
    $newsController->deleteNews($newsId);
  } else
    $newsController->respondMissingFields("newsId");
?>