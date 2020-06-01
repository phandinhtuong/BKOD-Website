<?php

session_start();
include ("DBSystem.php");
if ($_POST['message'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}

function login($username, $password) {
//        print($username);
//        print('<br>');
//        print($password);
//        print('<br>');
    $i = checkValidLogin($username, $password);
    if (is_null($i)) {
        print("CheckValidLogin Null!");
    } else if ($i == 1) {
        //print("log in okay");

        $_SESSION["u"] = $username;
        header('Location: ../views/Home.php');
        exit();
    } else if ($i == 0) {
        $_SESSION["w"] = "wrong";
        header('Location: ../views/index.php');
        exit();
        //print("no ok log in");
    }
}
?>

