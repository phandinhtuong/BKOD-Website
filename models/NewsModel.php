<?php

class NewsModel
{
  public function getAllNews()
  {
    require '../../utils/db_connection.php';

    $getAllNewsQuery = $db->prepare("SELECT * FROM news");
    if (PEAR::isError($getAllNewsQuery)) {
      return "Bad query detected!";
    }
    $res = &$db->execute($getAllNewsQuery);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!");
    } else {
      $allNews = array();
      while (($news = $res->fetchRow())) {
        $trueNews = array();
        foreach ($news as $key=>$value) {
          if ($key === 0)
            $trueNews["newsId"] = $value;
          else if ($key === 1)
          $trueNews["imageUrl"] = $value;
          else if ($key === 2)
          $trueNews["title"] = $value;
          else if ($key === 3)
          $trueNews["url"] = $value;
          else if ($key === 4)
          $trueNews["summary"] = $value;
          else if ($key === 5)
          $trueNews["isShowing"] = $value;
        }
        $allNews[] = $trueNews;
      }
      return json_encode($allNews);
    }

  }

  public function updateNews($newsId, $title, $summary, $imageURL){
    require '../../utils/db_connection.php';

    $updateNewsQuery = $db->prepare("UPDATE news
      SET title=?, summary=?, imageUrl=?
      WHERE newsId=? ");
    if (PEAR::isError($updateNewsQuery)) {
        return "Bad query detected!";
    }
    $data = array($title, $summary, $imageURL, $newsId);
    $res = &$db->execute($updateNewsQuery, $data);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!". $res->getDebugInfo());
    } else {
      return json_encode("Updated successfully!");
    }
  }
}
