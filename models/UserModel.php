<?php

class UserModel
{
  public function registerUser($username, $psw, $fullName) {
    require '../utils/db_connection.php';

    $hash256Password = $psw . $username . "BKODv1Habvietio";
    $hash256Password = hash("sha256", $hash256Password);
    $userId = time();

    $insertUserQuery = $db->prepare("INSERT INTO user (UserId, username, password, fullname) VALUES (?, ?, ?, ?)");
    if (PEAR::isError($insertUserQuery)) {
      return "Bad query detected!";
    }
    $data = array($userId, $username, $hash256Password, $fullName);
    $res = &$db->execute($insertUserQuery, $data);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      if (strpos($err, 'Duplicate entry') !== false) {
        return json_encode("Username already existed!");
      } else {
        return json_encode("An unknown error occured!");
      }
    } else {
      $loginInfo = array(
        'username' => $username,
        'psw' => $psw
      );
      return json_encode($loginInfo);
    }
  }

  public function getUserInfo($username)
  {
    require '../utils/db_connection.php';

    $getUsersInfoQuery = $db->prepare("SELECT * FROM user where username = ?");
    if (PEAR::isError($getUsersInfoQuery)) {
      return "Bad query detected!";
    }
    $res = &$db->execute($getUsersInfoQuery, $username);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!");
    } else {
      $user = $res->fetchRow();
      return json_encode($user);
    }
  }

  public function updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username){
    require '../utils/db_connection.php';

    $updateUserInfoQuery = $db->prepare("UPDATE user
      SET fullName=?, school=?, class=?, phoneNumber=?, birthday=?, gender=?
      WHERE username=? ");
    if (PEAR::isError($updateUserInfoQuery)) {
      return "Bad query detected!";
    }
    $data = array($fullName, $school, $class, $phone, $birthday, $gender, $username);
    $res = &$db->execute($updateUserInfoQuery, $data);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!");
    } else {
      return json_encode("Updated successfully!");
    }
  }

  public function getAllUsers() {
    require '../utils/db_connection.php';

    $getAllUsersQuery = $db->prepare("SELECT * FROM user");
    if (PEAR::isError($getAllUsersQuery)) {
      return "Bad query detected!";
    }
    $res = &$db->execute($getAllUsersQuery);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode("An unknown error occured!");
    } else {
      $allUsers = array();
      $count = 0;
      while (($user = $res->fetchRow())) {
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
      return json_encode($allUsers);
    }
  }

  public function deleteUser($username) {
    require '../utils/db_connection.php';

    $deleteUserQuery = $db->prepare("DELETE FROM user WHERE username=?;");
    if (PEAR::isError($deleteUserQuery)) {
      return "Bad query detected!";
    }
    $res = &$db->execute($deleteUserQuery, $username);

    if (PEAR::isError($res)) {
      $err = $res->getDebugInfo();
      return json_encode($err);
    } else {
      return json_encode("Deleted successfully!");
    }
  }
}
