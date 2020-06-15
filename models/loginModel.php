<?php
function login($username, $password) { //main function to login
//    input: username and password
//    direct to home page if check login successfully, or back to index if invalid username or password
    $i = checkValidLogin($username, $password); //main function to check login
    if (is_null($i)) {
        print("CheckValidLogin Null!");
    } else if ($i == 1) { // logged in successfully
        $_SESSION["u"] = $username;
        header('Location: ../views/Home.php');
        exit();
    } else if ($i == 0) { // invalid username or password
        $_SESSION["w"] = "wrong";
        header('Location: ../views/index.php');
        exit();
    }
}
function checkValidLogin($username, $password) { //main function to check login
    // input: username and password
    // output: 1 if valid username and password, 0 otherwise
    require '../utils/db_connection.php'; //require database connection
    $passwordString = $password . $username . "BKODv1Habvietio"; // password string to hash for security
    $hash256Password = hash("sha256", $passwordString);
    
    //$sql = "select * from user where username = '$username' and password = '$hash256Password';"; // SQL Injection by ' or 1=1;#
    //$result = $db->query($sql);
    
    $sql = 'select * from user where username = ? and password = ?'; // avoid SQL Injection
    $data = array($username, $hash256Password);
    $result = & $db->query($sql, $data);
    $row = $result->fetchRow();
    if (strcmp($row[1], $username) == 0 && strcasecmp($row[2], $hash256Password) == 0) { //check if the username and password are valid
        return 1;
    } else {
        return 0;
    }
}
?>
