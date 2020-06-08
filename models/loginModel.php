<?php
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
function checkValidLogin($username, $password) {
    require '../utils/db_connection.php';
    $hash256Password = $password . $username . "BKODv1Habvietio";
    $hash256Password = hash("sha256", $hash256Password);
    //print($hash256Password);
    //$sql = "select * from user where username = '$username' and password = '$hash256Password';"; // SQL Injection by ' or 1=1;#
    $sql = 'select * from user where username = ? and password = ?';
//    print("<br>");
//    print($sql);
//    print("<br>");
    //$result = $db->query($sql);
    $data = array($username, $hash256Password);
    //$data = $username;
    $result = & $db->query($sql, $data);
//    while ($row = $result->fetchRow()) {
//        for ($i = 0; $i < count($row); $i++)
//            print( "$row[$i]<br>");
//    }
    $row = $result->fetchRow();
//    echo '<script>console.log("Your stuff here")</script>';
//    $hash256Password = strtoupper($hash256Password);
//    print("<br>");
//    print($row[1]);
//    print("<br>");
//    print($username);
//    print("<br>");
//    print($row[2]);
//    print("<br>");
//    print($hash256Password);
//    print("<br>");

    if (strcmp($row[1], $username) == 0 && strcasecmp($row[2], $hash256Password) == 0) {
      //  print("OK");
        return 1;
    } else {
       // print("NO");
        return 0;
    }
}

?>