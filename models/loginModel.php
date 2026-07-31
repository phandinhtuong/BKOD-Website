<?php
function login($username, $password) { //main function to login
//    input: username and password
//    direct to home page if check login successfully, or back to index if invalid username or password
    $i = checkValidLogin($username, $password); //main function to check login
    if (is_null($i)) {
        print("CheckValidLogin Null!");
    } else if ($i == 1) { // logged in successfully
        session_regenerate_id(true);
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
    $sql = 'SELECT username, password FROM user WHERE username = ?';
    $data = array($username);
    $result = & $db->query($sql, $data);
    $row = $result->fetchRow();
    if (!$row || !isset($row[0], $row[1]) || !hash_equals($row[0], $username)) {
        return 0;
    }

    $storedHash = $row[1];
    if (password_verify($password, $storedHash)) {
        return 1;
    }

    // Upgrade legacy SHA-256 accounts on their first successful login.
    $legacyHash = hash('sha256', $password . $username . 'BKODv1Habvietio');
    if (hash_equals(strtolower($storedHash), strtolower($legacyHash))) {
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        $update = $db->prepare('UPDATE user SET password = ? WHERE username = ?');
        $db->execute($update, array($newHash, $username));
        return 1;
    }
    return 0;
}
?>
