<?php

function getUsersInfo()
{
  require '../utils/db_connection.php';

  $username = $_SESSION["u"];

  $getUsersInfoQuery = $db->prepare("SELECT * FROM user where username = ?");
  if (PEAR::isError($getUsersInfoQuery)) {
    echo "Bad query detected!";
  }

  $res = &$db->execute($getUsersInfoQuery, $username);

  if (PEAR::isError($res)) {
    $err = $res->getDebugInfo();
    echo $err;
  } else {
    $user = $res->fetchRow();
    // foreach ($user as $key => $value) {
    //   echo $value;
    // }
    return $user;
  }
}
