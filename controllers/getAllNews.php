<?php
  header('Content-Type: application/json');
  include ("../models/NewsModel.php");

  $newsModel = new NewsModel();
  echo $newsModel->getAllNews();
?>
