<?php
  include ("NewsController.php");
  $_POST = json_decode(file_get_contents('php://input'), true);
  if (isset($_POST['title'], $_POST["summary"], $_POST["url"], $_POST["imageURL"])) {
    $title = $_POST['title'];
    $summary = $_POST["summary"];
    $url = $_POST['url'];
    $imageURL = $_POST['imageURL'];
    $newsController->validateInput($title, $summary, $url);
    $newsController->addNews($title, $summary, $url, $imageURL);
  } else
    $newsController->respondMissingFields("title", "summary", "url", "imageURL");
?>