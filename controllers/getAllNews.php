<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$getAllNewsQuery = $db->prepare("SELECT * FROM news");
if (PEAR::isError($getAllNewsQuery)) {
  echo "Bad query detected!";
}

$res = &$db->execute($getAllNewsQuery);

if (PEAR::isError($res)) {
  $err = $res->getDebugInfo();
  echo json_encode("An unknown error occured!");
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
  echo json_encode($allNews);
}
