<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$getAllUsersQuery = $db->prepare("SELECT * FROM user");
if (PEAR::isError($getAllUsersQuery)) {
  echo "Bad query detected!";
}

$res = &$db->execute($getAllUsersQuery);

if (PEAR::isError($res)) {
  $err = $res->getDebugInfo();
  echo json_encode("An unknown error occured!");
} else {
  $allUsers = array();
  while (($user = $res->fetchRow())) {
    $trueUser = array();
    foreach ($user as $key=>$value) {
      if ($key === 0)
        $trueUser["userId"] = $value;
      else if ($key === 1)
      $trueUser["username"] = $value;
      else if ($key === 3)
      $trueUser["fullName"] = $value;
      else if ($key === 4)
      $trueUser["birthday"] = $value;
      else if ($key === 5)
      $trueUser["gender"] = $value;
      else if ($key === 6)
      $trueUser["school"] = $value;
      else if ($key === 7)
      $trueUser["class"] = $value;
      else if ($key === 8)
      $trueUser["phoneNumber"] = $value;
      else if ($key === 9)
      $trueUser["isCounselor"] = $value;
      else if ($key === 10)
      $trueUser["state"] = $value;
    }
    $allUsers[] = $trueUser;
  }
  echo json_encode($allUsers);
}
