<?php
header('Content-Type: application/json');
include ("Controller.php");

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

include ("../models/UserModel.php");
$userController = new UserController(new UserModel());

$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['action'])) {
  $action = $_POST['action'];
  switch ($action) {
    case "getAllUsers":
      $userController->getAllUsers();
      break;
    case "getUserInfo":
      if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $userController->getUserInfo($username);
      }
      else $userController->respondMissingFields();
      break;
    case "updateUserInfo":
      if (isset($_POST['username'], $_POST["fullName"], $_POST["school"], $_POST["classVar"], $_POST["phone"], $_POST["birthday"], $_POST["gender"])) {
        $username = $_POST['username'];
        $fullName = $_POST["fullName"];
        $school = $_POST["school"];
        $class = $_POST["classVar"];
        $phone = $_POST["phone"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $userController->updateUserInfo($fullName, $school, $class, $phone, $birthday, $gender, $username);
      }
      else $userController->respondMissingFields();
      break;
    case "deleteUser":
      if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $userController->deleteUser($username);
      }
      else $userController->respondMissingFields();
      break;
    case "registerUser":
      if (isset($_POST['username'], $_POST["psw"], $_POST["fullName"])) {
        $username = $_POST['username'];
        $fullName = $_POST["fullName"];
        $psw = $_POST['psw'];
        $userController->registerUser($username, $psw, $fullName);
      }
      else $userController->respondMissingFields();
      break;
  }
} else {
  $userController->respondMissingFields();
}


?>