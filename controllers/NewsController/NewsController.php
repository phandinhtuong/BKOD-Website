<?php
header('Content-Type: application/json');
include ("../Controller.php");

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

  public function updateNews($newsId, $title, $summary, $imageURL) {
    try {
      $res = $this->_model->updateNews($newsId, $title, $summary, $imageURL);
      echo $res;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }

  public function deleteNews($newsId) {
    try {
      $res = $this->_model->deleteNews($newsId);
      echo $res;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }
}

include ("../../models/NewsModel.php");
$newsController = new NewsController(new NewsModel());

?>