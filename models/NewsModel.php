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

  public function updateNews($newsId, $url, $title, $summary, $imageURL){
    require '../../utils/db_connection.php';

    $updateNewsQuery = $db->prepare("UPDATE news
      SET title=?, summary=?, imageUrl=?, url=?
      WHERE newsId=? ");
    if (PEAR::isError($updateNewsQuery)) {
        return "Bad query detected!";
    }
    $data = array($title, $summary, $imageURL, $url, $newsId);
    $res = &$db->execute($updateNewsQuery, $data);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!". $res->getDebugInfo());
    } else {
      return json_encode("Updated successfully!");
    }
  }

  public function deleteNews($newsId) {
    require '../../utils/db_connection.php';

        $deleteNewsQuery = $db->prepare("DELETE FROM news WHERE newsId=?;");
        if (PEAR::isError($deleteNewsQuery)) {
            return "Bad query detected!";
        }
        $res = &$db->execute($deleteNewsQuery, $newsId);

        if (PEAR::isError($res)) {
            $err = $res->getDebugInfo();
            return json_encode($err);
        } else {
            return json_encode("Deleted successfully!");
        }
    }

  public function addNews($title, $summary, $url, $imageURL) {
    require '../../utils/db_connection.php';

    $newsId = time()/10;

    $insertNewsQuery = $db->prepare("INSERT INTO news (newsId, imageUrl, title, url, summary, isShowing) VALUES (?, ?, ?, ?, ?, 1)");
    if (PEAR::isError($insertNewsQuery)) {
        return "Bad query detected!";
    }
    $data = array($newsId, $imageURL, $title, $url, $summary);
    $res = &$db->execute($insertNewsQuery, $data);

    if (PEAR::isError($res)) {
        $err = $res->getDebugInfo();
        return json_encode($err);
    } else {
        return json_encode("Added successfully!");
    }
  }
}
