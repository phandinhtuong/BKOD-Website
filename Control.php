<?php
include ("system1.php");
    if ($_POST['message'] == 'login'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        login($username, $password);
    }
    function login($username, $password){
        print($username);
        print('<br>');
        print($password);
         print('<br>');
        checkValidLogin($username,$password);
    }
?>

