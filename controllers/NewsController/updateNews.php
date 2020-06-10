<?php
  include ("NewsController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['newsId'], $_POST['url'], $_POST["title"], $_POST["summary"], $_POST["imageURL"])) {
    $newsId = $_POST['newsId'];
    $url = $_POST['url'];
    $title = $_POST["title"];
    $summary = $_POST["summary"];
    $imageURL = $_POST["imageURL"];
    $newsController->validateInput($newsId, $url, $title, $summary);
    $newsController->updateNews($newsId, $url, $title, $summary, $imageURL);
  } else
    $newsController->respondMissingFields("newsId", "url", "title", "summary", "imageURL");
?>