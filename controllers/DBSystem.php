<?php

function checkValidLogin($username, $password) {
    require '../utils/db_connection.php';
    $hash256Password = $password . $username . "BKODv1Habvietio";
    $hash256Password = hash("sha256", $hash256Password);
    //print($hash256Password);
    //$sql = "select * from user where username = '$username' and password = '$hash256Password';"; // SQL Injection by ' or 1=1;#
    $sql = $db->prepare('select * from user where username = ? and password = ?');
    $sql->bind_param("ss", $username, $hash256Password);
//    print("<br>");
//    print($sql);
//    print("<br>");
    //$result = $db->query($sql);
    //$data = $username;
    $sql->execute();
//    while ($row = $result->fetchRow()) {
//        for ($i = 0; $i < count($row); $i++)
//            print( "$row[$i]<br>");
//    }
    $result = $sql->get_result();


    $row = $result->fetch_row();
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
