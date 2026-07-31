<?php
require_once("../utils/auth.php");
requireSameOriginPost();
startSecureSession();
include ("../models/loginModel.php");
if (isset($_POST['message']) && $_POST['message'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password); //main function to login
}
?>

