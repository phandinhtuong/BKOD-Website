<?php

class MessageModel {

    public $receiverId;
    public $senderId;

    public function __construct($receiverId) {
        $this->receiverId = $receiverId;
    }

    public function getAllMessages() {
        require '../utils/db_connection.php';

        $allMessages = array();
        $trueMessage = array();

//        $getAllMessagesQuery = $db->prepare("SELECT * FROM message");
        $getAllMessagesQuery = $db->prepare("SELECT * FROM message WHERE recieverId = '" . $this->receiverId . "'");

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
            echo "<table border='1'>";
            foreach ($allMessages as $row) {
//while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['senderId'] . "</td>";
                echo "<td>" . $row['recieverId'] . "</td>";
                echo "<td>" . $row['mContent'] . "</td>";
                echo "<td>" . $row['messageId'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    public function getMessagesById() {
        require '../utils/db_connection.php';
        $getMessagesByIdQuery = $db->prepare("SELECT * FROM message WHERE recieverId = '" . $receiverId . "'");
    }

}
