<?php
header('Content-Type: application/json');
include ("Controller.php");

class NewsController extends Controller
{
  public function __construct($model)
  {
  parent::__construct($model);
  }

  public function getAllNews() {
    try {
      $allNews = $this->_model->getAllNews();
      echo $allNews;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }
}

include ("../models/NewsModel.php");
$newsController = new NewsController(new NewsModel());
$newsController->getAllNews();

?>