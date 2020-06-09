<?php
header('Content-Type: application/json');
include ("../Controller.php");

class UserController extends Controller
{
  public function __construct($model)
  {
  parent::__construct($model);
  }

  public function getAllUsers() {
    try {
      $allUsers = $this->_model->getAllUsers();
      echo $allUsers;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }

  public function getUserInfo($username) {
    try {
      $userInfo = $this->_model->getUserInfo($username);
      echo $userInfo;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }

  public function updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username) {
    try {
      $res = $this->_model->updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username);
      echo $res;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }

  public function deleteUser($username) {
    try {
      $res = $this->_model->deleteUser($username);
      echo $res;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }

  public function registerUser($username, $psw, $fullName) {
    try {
      $res = $this->_model->registerUser($username, $psw, $fullName);
      echo $res;
    } catch (Exception $e) {
      echo json_encode("Application error:" . $e->getMessage());
    }
  }


}

include ("../../models/UserModel.php");
$userController = new UserController(new UserModel());

?>