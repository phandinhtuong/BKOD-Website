<?php
require '../utils/db_connection.php';
header('Content-Type: application/json');

$getAllUsersQuery = $db->prepare("SELECT * FROM user");

$success = $getAllUsersQuery->execute();

if( $success !== false ) {
  $res = $getAllUsersQuery->get_result();
  $allUsers = array();
  $count = 0;
  while (($user = $res->fetch_row())) {
    $count++;
    $trueUser = array();
    $trueUser["no"] = $count;
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
}else {
  echo json_encode("An unknown error occured!");
}
