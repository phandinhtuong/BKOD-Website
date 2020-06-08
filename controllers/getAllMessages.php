<?php

require '../utils/db_connection.php';
header('Content-Type: application/json');
$allMessages = array();
$trueMessage = array();

$getAllMessagesQuery = $db->prepare("SELECT * FROM message");
if (PEAR::isError($getAllMessagesQuery)) {
    echo "Bad query detected!";
}

$res = &$db->execute($getAllMessagesQuery);

if (PEAR::isError($res)) {
    $err = $res->getDebugInfo();
    echo json_encode("An unknown error occured!");
} else {
    while (($message = $res->fetchRow())) {
        foreach ($message as $key => $value) {
            if ($key === 0)
                $trueMessage["senderId"] = $value;
            else if ($key === 1)
                $trueMessage["recieverId"] = $value;
            else if ($key === 2)
                $trueMessage["messageId"] = $value;
            else if ($key === 3)
                $trueMessage["mContent"] = $value;
            else if ($key === 4)
                $trueMessage["time"] = $value;
        }
        $allMessages[] = $trueMessage;
    }
//    echo json_encode($allMessages);
    echo "<table border='0'>";
    foreach ($allMessages as $row) {
//while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>" . $row['senderId'] . "</td>";
        echo "<td>" . $row['recieverId'] . "</td>";
        echo "<td>" . $row['mContent'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
}
