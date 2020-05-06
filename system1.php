<?php



function checkValidLogin($username, $password) {
    require 'db_connection.php';
    $hash256Password = $password . $username . "BKODv1Habvietio";
    $hash256Password = hash("sha256", $hash256Password);
    print($hash256Password);
    $sql = "select * from user where username = '$username';";
    print($sql);
    $result = $db->query($sql);
    while ($row = $result->fetchRow()) {
        for ($i = 0; $i < count($row); $i++)
            print( "$row[$i]<br>");
    }
    return 0;
}

?>
