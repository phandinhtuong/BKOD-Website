<?php

session_start();
include ("../models/loginModel.php");
if ($_POST['message'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}


?>

